<?php

namespace Models;

use Exception;
use \mysqli;

abstract class BaseModel
{
    /**
     * Function for opening connection to DB
     *
     * @return \mysqli
     */
    protected function openCon(): \mysqli
    {
        return (new \mysqli(DBHOST, DBUSER, DBPASS, DBNAME));
    }

    /**
     * Function for closing connection to DB
     *
     * @param mysqli $conn
     * @return void
     */
    protected function closeCon(\mysqli $conn): void
    {
        $conn->close();
    }

    /**
     * Generalized method for saving all data from class variables to .json file with the same name as class
     *
     * @return void
     * @throws Exception
     */
    public function savingData(): void
    {
        $extension = CONFIG['currentStorageMethod'];

        $className = str_replace('\\', '/', get_class($this));
        $partialDirectory = __DIR__ . '/../data/' . basename($className) . '.';
        $directory = $partialDirectory . $extension;

        if ($extension === 'json') {
            $data = json_decode(file_get_contents($directory), true);
        } else if ($extension === 'xml') {
            $data = xmlrpc_decode(file_get_contents($directory), true);
        }

        $new_entry = [];

        foreach (get_object_vars($this) as $key => $value) {
            $new_entry[$key] = $value;
        }

        $data[] = $new_entry;
        file_put_contents($directory, json_encode($data, JSON_PRETTY_PRINT));
        if ($extension === 'json') {
            file_put_contents($directory, json_encode($data, JSON_PRETTY_PRINT));
        } else if ($extension === 'xml') {
            file_put_contents($directory, xmlrpc_encode($data));
        } else if ($extension === 'mysql') {
            $className = basename($className);
            try {
                $conn = $this->openCon();

                //building query that inserts values for any model (any number of attributes)
                $query = 'INSERT INTO ' . $className . ' VALUES (';
                $placeholders = '';
                $values = [];
                foreach ($new_entry as $key => $item) {
                    if ($key !== 'products') {
                        $values[] = $item;
                        $query .= '?, ';
                        $placeholders .= 's';
                    }
                }
                $query = rtrim($query, ', ');
                $query .= ')';

                $stmt = $conn->prepare($query);
                array_unshift($values, $placeholders);
                call_user_func_array([$stmt, 'bind_param'], $values);
                $stmt->execute();

                //branchOffice needs to save all the products to separate table
                if ($className === 'BranchOffice') {
                    foreach ($new_entry['products'] as $product) {
                        $query = $conn->prepare('INSERT INTO BranchOfficeProduct (branchOfficeId, productId) VALUES (?, ?)');
                        $query->bind_param('ss', $new_entry['uuid'], $product);
                        $query->execute();
                    }
                }

                $this->closeCon($conn);
            } catch (\mysql_xdevapi\Exception $e) {
                var_dump('Something went wrong!');
            }
        }

        if (!empty($_FILES['productFile']['tmp_name'])) {
            $this->saveImage(basename($className), $this->getExistingUuid());
        }
    }

    /**
     * Function for generating uuid
     *
     * @return string
     * @throws Exception
     */
    public function getUuid(): string
    {
        return uuid();
    }

    /**
     * Function for saving image to data/files/$folderName/$fileName directory
     *
     * @param string $folderName
     * @param string $filename
     * @return bool
     */
    public function saveImage(string $folderName, string $filename): bool
    {
        $uploadedFile = $_FILES['productFile'];
        $fileExtension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileExtension, $allowedFormats)) {
            return false;
        }

        $fileDir = base_path('data/files/' . $folderName . '/');

        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0755, true);
        }

        $targetPath = $fileDir . $filename . '.' . $fileExtension;

        if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {
            return true;
        }

        return false;
    }
}