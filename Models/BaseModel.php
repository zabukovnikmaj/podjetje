<?php

namespace Models;

use Exception;

abstract class BaseModel
{
    /**
     * generalized method for saving all data from class variables to .json file with the same name as class
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
        }


        if (!empty($_FILES['productFile']['tmp_name'])) {
            $this->saveImage(basename($className), $this->getUuid());
        }
    }

    /**
     * method for generating uuid
     *
     * @return string
     * @throws Exception
     */
    public function getUuid(): string
    {
        return uuid();
    }

    /**
     * function for saving image to data/files/$folderName/$fileName directory
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