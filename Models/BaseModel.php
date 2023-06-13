<?php

namespace Models;

use Exception;
use SimpleXMLElement;

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
            $this->saveAsJsonFile($directory);
        } else if ($extension === 'xml') {
            $this->saveAsXmlFile($directory);
        }


        if (!empty($_FILES['productFile']['tmp_name'])) {
            $this->saveImage(basename($className), $this->getUuid());
        }
    }

    /**
     * function for saving data as .xml file
     *
     * @param string $directory
     * @return bool
     * @throws Exception
     */
    private function saveAsXmlFile(string $directory): bool
    {
        $xml = new \SimpleXMLElement(file_get_contents($directory));

        $new_entry = $xml->addChild('entry');

        foreach (get_object_vars($this) as $key => $value) {
            $new_entry->addChild($key, $value);
        }

        return file_put_contents($directory, $xml->asXML());
    }

    /**
     * function for saving data as .json file
     *
     * @param string $directory
     * @return bool
     */
    private function saveAsJsonFile(string $directory): bool
    {
        $data = json_decode(file_get_contents($directory), true);

        $new_entry = [];

        foreach (get_object_vars($this) as $key => $value) {
            $new_entry[$key] = $value;
        }

        $data[] = $new_entry;
        return file_put_contents($directory, json_encode($data, JSON_PRETTY_PRINT));
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