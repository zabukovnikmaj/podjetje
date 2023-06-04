<?php

namespace Models;

use Exception;

abstract class BaseModel
{
    /**
     * generalized method for saving all data from class variables to .json file with the same name as class
     *
     * @return void
     */
    public function savingData(): void
    {
        $className = str_replace('\\', '/', get_class($this));
        $directory = __DIR__ . '/../data/' . basename($className) . '.json';
        $data = json_decode(file_get_contents($directory), true);
        $new_entry = [];

        foreach (get_object_vars($this) as $key => $value) {
            $new_entry[$key] = $value;
        }

        $data[] = $new_entry;
        file_put_contents($directory, json_encode($data, JSON_PRETTY_PRINT));

        if(!empty($_FILES['productFile']['tmp_name'])){
            $this->saveImage(basename($className), $new_entry['uuid']);
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
        $fileDir = base_path('data/files/' . $folderName . '/');

        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0755, true);
        }

        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];

        $uploadedFile = $_FILES['productFile'];
        $fileExtension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedFormats)) {
            return false;
        }

        $targetPath = $fileDir . $filename . '.' . $fileExtension;

        if (move_uploaded_file($uploadedFile['tmp_name'], $targetPath)) {
            return true;
        }

        return false;
    }
}