<?php

namespace Services;

class Storage
{
    /**
     * Load elements from table to array
     *
     * @param string $tableName
     * @return array
     */
    public static function loadElements(string $tableName): array
    {
        $filename = storage_path($tableName . '.' . CONFIG['currentStorageMethod']);
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
     * @param string $encodedData
     * @param string $extension
     * @return void
     */
    public static function saveElements(string $tableName, string $encodedData, string $extension = 'json'): void
    {
        $filename = storage_path($tableName . '.' . $extension);
        file_put_contents($filename, $encodedData);
    }
}