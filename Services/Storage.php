<?php

namespace Services;

use Models\Model;

class Storage
{
    /**
     * Generate unique ID for element
     *
     * @param string $tableName
     * @return int
     */
    public function generateId(string $tableName): int
    {
        $elements = $this->loadElements($tableName);
        return count($elements) + 1;
    }

    /**
     * Add new element
     *
     * @param string $tableName
     * @param Model $model
     * @return void
     */
    public function addElement(string $tableName, Model $model): void
    {
        $elements = $this->loadStorage($tableName);
        $elements["data"][$model->id] = $model;

        $this->saveElements($tableName, json($elements));
    }

    /**
     * Load elements from table to array
     *
     * @param string $tableName
     * @return array
     */
    public static function loadElements(string $tableName): array
    {
        $filename = storage_path($tableName . ".json");
        if (!file_exists($filename)) {
            return [];
        }

        $data = file_get_contents($filename);
        return (array)json_decode($data, true);
    }

    /**
     * save elements to the table
     *
     * @param string $tableName
     * @param string $jsonEncodedData
     * @return void
     */
    public static function saveElements(string $tableName, string $jsonEncodedData): void
    {
        $filename = storage_path($tableName . ".json");
        file_put_contents($filename, $jsonEncodedData);
    }
}