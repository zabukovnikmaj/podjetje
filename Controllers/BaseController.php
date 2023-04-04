<?php

namespace Controllers;

use Services\Storage;
use Services\Validator;

abstract class BaseController
{
    /**
     * function for filtering out specified data from inputed array
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
     *general function for deleting selected item from json file
     *
     * @return void
     */
    public function deleteItem(): void
    {
        $filename = substr(strrchr(get_class($this), "\\"), 1);
        $existingData = Storage::loadElements($filename);
        $newData = [];

        foreach ($existingData as $item) {
            if ($item['uuid'] != $_GET['id']) {
                $newData[] = $item;
            }
        }

        Storage::saveElements($filename, $newData);
        header('Location: /' . strtolower(substr($filename, 0, 1)) . substr($filename, 1) . '/list/');
    }

    /**
     * general function for displaying data to edit
     *
     * @return void
     */
    public function displayEditItem(): void
    {
        $filename = substr(strrchr(get_class($this), "\\"), 1);
        $existingData = Storage::loadElements($filename);

        $filename = strtolower(substr($filename, 0, 1)) . substr($filename, 1);
        view($filename . '/edit', [
            'existingData' => $existingData
        ]);
    }

    /**
     * general function for saving edited data
     *
     * @return void
     */
    public function saveEditedData(): void
    {
        $errors = Validator::required([], $_POST, 'name', 'address', 'products');
        $errors = $this->validateData($errors);

        $filename = substr(strrchr(get_class($this), "\\"), 1);
        $existingData = Storage::loadElements($filename);
        $filename = strtolower(substr($filename, 0, 1)) . substr($filename, 1);

        if (!empty($err)) {
            view($filename . '/' . 'edit', [
                'errors' => $err
            ]);
            return;
        }

        $index = 0;
        foreach ($existingData as $data){
            if($data['uuid'] === $_GET['id']){
                foreach ($data as $filed => $element){
                    if(isset($_POST[$filed])){
                        if($filed === 'products'){
                            $existingData[$index][$filed] = $this->makeArray($_POST['products']);
                        }else{
                            $existingData[$index][$filed] = $_POST[$filed];
                        }
                    }
                }
                break;
            }
            $index++;
        }

        Storage::saveElements(substr(strrchr(get_class($this), "\\"), 1), $existingData);

        header('Location: /' . $filename . '/list/');
    }
}