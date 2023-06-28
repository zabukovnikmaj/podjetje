<?php

namespace Controllers;

use mysql_xdevapi\Exception;
use Services\Storage;
use Services\Validator;

abstract class BaseController
{
    /**
     * Function for filtering out specified data from inputed array
     *
     * @param array $array
     * @param string $filterBy
     * @return array
     */
    protected function filterArray(array $array, string $filterBy): array
    {
        return array_filter($array, function ($value) use ($filterBy) {
            return $value !== $filterBy;
        });
    }

    /**
     * General function for deleting selected item from json file
     *
     * @param string $id
     * @return void
     */
    public function deleteItem(string $id): void
    {
        $filename = $this->getFilenameFromClass();

        if (CONFIG['currentStorageMethod'] === 'mysql') {
            try {
                $conn = new \mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

                $stmt = $conn->prepare("DELETE FROM $filename WHERE uuid = ?");
                $stmt->bind_param('s', $id);
                $stmt->execute();

                $stmt->close();
                $conn->close();

            } catch (Exception $e) {
                echo 'There was an error!';
            } finally {
                redirect('/' . strtolower(substr($filename, 0, 1)) . substr($filename, 1) . '/list/');
                return;
            }
        }

        $existingData = Storage::loadElements($filename);
        $newData = [];

        foreach ($existingData as $item) {
            if ($item['uuid'] != $id) {
                $newData[] = $item;
            } else {
                $this->deleteImage($item['uuid'], $item['fileType'] ?? '');
            }
        }

        Storage::saveElements($filename, json($newData));

        $this->cascadeDelete();

        redirect('/' . strtolower(substr($filename, 0, 1)) . substr($filename, 1) . '/list/');
    }

    /**
     * Function for deleting image if it exists
     *
     * @param string $uuid
     * @param string $extension
     * @return bool
     */
    private function deleteImage(string $uuid, string $extension): bool
    {
        $directory = $this->imagePathBuilder($uuid, $extension);
        if (file_exists($directory)) {
            return unlink($directory);
        }
        return false;
    }

    /**
     * Function responsible for deleting all the foreign keys after primary key has been deleted
     *
     * @return void
     */
    private function cascadeDelete(): void
    {
        $employees = Storage::loadElements('Employees');
        $products = Storage::loadElements('Products');
        $branchOffices = Storage::loadElements('BranchOffice');
        $newBranchOffices = [];

        //checking relation branchOffice : products
        for ($i = 0; $i < sizeof($branchOffices); $i++) {
            foreach ($branchOffices[$i] as $key => $value) {
                if ($key !== 'products') {
                    $newBranchOffices[$i][$key] = $value;
                } else {
                    $newBranchOffices[$i][$key] = [];
                }
            }
            for ($j = 0; $j < sizeof($branchOffices[$i]['products']) - 1; $j++) {
                if ($this->isInArray($branchOffices[$i]['products'][$j], $products)) {
                    $newBranchOffices[$i]['products'][$j] = $branchOffices[$i]['products'][$j];
                }
            }
        }

        //checking relation employee : branchOffice
        for ($i = 0; $i < sizeof($employees); $i++) {
            if (!$this->isInArray($employees[$i]['branchOffice'], $branchOffices)) {
                $employees[$i]['branchOffice'] = '';
            }
        }

        //saving changed data
        Storage::saveElements('Employees', json($employees));
        Storage::saveElements('BranchOffice', json($newBranchOffices));
    }

    /**
     * Function for finding if some element is inside array
     *
     * @param string $needle
     * @param array $haystack
     * @return bool
     */
    private function isInArray(string $needle, array $haystack): bool
    {
        foreach ($haystack as $item) {
            if ($item['uuid'] === $needle) {
                return true;
            }
        }
        return false;
    }

    /**
     * General function for displaying data to edit
     *
     * @param string $id
     * @return string
     */
    public function displayEditItem(string $id): string
    {
        $filename = $this->getFilenameFromClass();
        $existingData = Storage::loadElements($filename, true);
        $filteredData = [];

        foreach ($existingData as $data) {
            if ($data['uuid'] == $id) {
                $filteredData = $data;
                break;
            }
        }

        if ($filteredData === []) {
            http_response_code(404);
            die("404 Not Found");
        }

        $filename = strtolower(substr($filename, 0, 1)) . substr($filename, 1);

        return view($filename . '/edit', [
            'filteredData' => $filteredData,
            'products' => Storage::loadElements('Products'),
            'branchOffices' => Storage::loadElements('BranchOffice')
        ]);
    }

    /**
     * General function for saving edited data
     *
     * @param string $params
     * @return string
     */
    public function saveEditedData(string $params): string
    {
        $filename = $this->getFilenameFromClass();
        $err = $this->validateData([]);

        if (!empty($err)) {
            return view($filename . '/edit', [
                'err' => $err,
                'products' => Storage::loadElements('Products'),
                'branchOffices' => Storage::loadElements('BranchOffice'),
                'filteredData' => $_POST
            ]);
        }

        if (CONFIG['currentStorageMethod'] === 'mysql') {
            try {
                $conn = new \mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
                if ($filename === 'BranchOffice') {
                    $stmt = $conn->prepare("UPDATE BranchOffice SET name = ?, address = ? WHERE uuid = ?");
                    $stmt->bind_param('sss', $_POST['name'], $_POST['address'], $params);
                    $stmt->execute();
                    $stmt->close();

                    $stmt = $conn->prepare("DELETE FROM BranchOfficeProduct WHERE branchOfficeId = '$params'");
                    $stmt->execute();
                    $stmt->close();

                    foreach ($_POST['products'] as $product) {
                        $stmt = $conn->prepare("INSERT INTO BranchOfficeProduct (branchOfficeId, productId) VALUES (?, ?)");
                        $stmt->bind_param('ss', $params, $product);
                        $stmt->execute();
                        $stmt->close();
                    }
                } else if ($filename === 'Employees') {
                    $stmt = $conn->prepare("UPDATE Employees SET branchOffice = ?, name = ?, position = ?, age = ?, sex = ?, email = ? WHERE uuid = ?");
                    $stmt->bind_param('sssssss', $_POST['branchOffice'], $_POST['name'], $_POST['position'], $_POST['age'], $_POST['sex'], $_POST['email'], $params);
                    $stmt->execute();
                } else if ($filename === 'Products') {
                    $filetype = strtolower(pathinfo($_FILES['productFile']['name'], PATHINFO_EXTENSION));

                    $stmt = $conn->prepare("UPDATE Products SET name = ?, description = ?, price = ?, date = ?, fileType = ? WHERE uuid = ?");
                    $stmt->bind_param('ssssss', $_POST['name'], $_POST['description'], $_POST['price'], $_POST['deliveryDate'], $filetype, $params);
                    $stmt->execute();
                }
            } catch (\mysqli_sql_exception $exception) {
                echo $exception;
            } finally {
                $conn->close();
                redirect('/' . strtolower(substr($filename, 0, 1)) . substr($filename, 1) . '/list/');
                return '';
            }
        }

        $existingData = Storage::loadElements($filename);
        $filename = strtolower(substr($filename, 0, 1)) . substr($filename, 1);

        $existingData = $this->replaceExistingData($existingData, $params);

        Storage::saveElements($this->getFilenameFromClass(), json($existingData));

        redirect('/' . $filename . '/list/');
    }

    /**
     * Function for finding data that will be changed and changing it
     *
     * @param array $existingData
     * @param string $params
     * @return array
     */
    protected function replaceExistingData(array $existingData, string $params): array
    {
        $index = 0;
        foreach ($existingData as $data) {
            if ($data['uuid'] === $params) {
                foreach ($data as $filed => $element) {
                    if (!empty($_FILES['productFile']['name']) && $filed === 'fileType') {
                        $this->deleteImage($existingData[$index]['uuid'], $existingData[$index]['fileType']);
                        $model = new \Models\Products();
                        if ($model->saveImage($this->getFilenameFromClass(), $existingData[$index]['uuid'])) {
                            $existingData[$index][$filed] = pathinfo($_FILES['productFile']['name'], PATHINFO_EXTENSION);
                        }
                    } else if (isset($_POST[$filed])) {
                        $existingData[$index][$filed] = $_POST[$filed];
                    }
                }
                break;
            }
            $index++;
        }
        return $existingData;
    }

    /**
     * Function for getting file name from class name
     *
     * @return string
     */
    protected function getFilenameFromClass(): string
    {
        return substr(strrchr(get_class($this), "\\"), 1);
    }

    /**
     * Function for getting name of the item/branch office from uuid for nicer data displaying
     *
     * @param string $table
     * @param string $uuid
     * @return string
     */
    protected function getNameFromUuid(string $table, string $uuid): string
    {
        $data = Storage::loadElements($table);
        foreach ($data as $item) {
            if ($item['uuid'] == $uuid) {
                return $item['name'];
            }
        }
        return '';
    }

    /**
     * Function for returning path to the image
     *
     * @param string $uuid
     * @param string $extension
     * @return string
     */
    protected function imagePathBuilder(string $uuid, string $extension): string
    {
        return base_path('data/files/' . $this->getFilenameFromClass() . '/' . $uuid . '.' . $extension);
    }

    /**
     * Function for returning image to a request
     *
     * @param string $uuid
     * @return void
     */
    public function prepareImage(string $uuid): void
    {
        $imagePath = '';
        $data = Storage::loadElements($this->getFilenameFromClass());
        foreach ($data as $item) {
            if ($item['uuid'] === $uuid) {
                $imagePath = $this->imagePathBuilder($uuid, $item['fileType']);
            }
        }

        if (file_exists($imagePath) && is_file($imagePath)) {
            $mime = mime_content_type($imagePath);
            $imageData = file_get_contents($imagePath);

            header("Content-Type: $mime");
            header("Content-Disposition: inline; filename=image.jpg");

            echo $imageData;
            exit();
        }

        http_response_code(404);
        echo "Image not found";
    }
}