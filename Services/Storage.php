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
        $elements = $this->loadElements($tableName);
        $elements[] = $model;

        $this->saveElements($tableName, $elements);
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
     * Save elements to table
     *
     * @param string $tableName
     * @param array $elements
     * @return void
     */
    private function saveElements(string $tableName, array $elements): void
    {
        $filename = storage_path($tableName . ".json");
        file_put_contents($filename, json_encode($elements));
    }
}