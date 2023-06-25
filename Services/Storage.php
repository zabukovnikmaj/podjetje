<?php

namespace Services;

use Exception;
use \mysqli;

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
        if (CONFIG['currentStorageMethod'] === 'mysql') {
            try {
                $neki = self::loadFromDb($tableName);
                //var_dump($neki);
            } catch (\mysqli_sql_exception $exception) {
                echo 'There was an error!';
            }
        }

        $filename = storage_path($tableName . '.' . CONFIG['currentStorageMethod']);
        if (!file_exists($filename)) {
            return [];
        }

        $data = file_get_contents($filename);
        if (CONFIG['currentStorageMethod'] === 'xml') {
            return (array)json_decode(json_encode(xmlrpc_decode($data)), true);
        }
        return (array)json_decode($data, true);
    }

    private static function loadFromDb(string $tableName): array
    {
        $conn = new \mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        $sql = 'SELECT * FROM ' . $tableName;
        if ($tableName === 'BranchOffice') {
            $sql = "SELECT BranchOffice.*, GROUP_CONCAT(Products.name) AS products
                            FROM BranchOffice
                            LEFT JOIN BranchOfficeProduct ON BranchOffice.uuid = BranchOfficeProduct.branchOfficeId
                            LEFT JOIN Products ON Products.uuid = BranchOfficeProduct.productId
                            GROUP BY BranchOffice.uuid";

        }

        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
            var_dump($output);
            return $output;
        } else {
            return [];
        }
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

    /**
     * function for changing appropriate files with data to correct format as stated in config file
     *
     * @return void
     */
    public static function changeDataFilesToCorrectFormat(): void
    {
        $tableNames = ['Products', 'Employees', 'BranchOffice'];
        $tableContents = [];

        foreach ($tableNames as $tableName) {
            foreach (CONFIG['possibleStorageMethods'] as $extension) {
                $dir = storage_path($tableName . '.' . $extension);
                if (file_exists($dir) && $extension !== CONFIG['currentStorageMethod']) {
                    $tableContents[$tableName] = ['content' => file_get_contents($dir), 'extension' => $extension];
                    unlink($dir);
                }
            }
        }

        foreach ($tableContents as $key => $tableContent) {
            $extension = CONFIG['currentStorageMethod'];
            $dir = storage_path($key . '.' . $extension);

            if ($tableContent['extension'] === 'json') {
                file_put_contents($dir, xmlrpc_encode(json_decode($tableContent['content'])));
            } else if ($tableContent['extension'] === 'xml') {
                file_put_contents($dir, json_encode(xmlrpc_decode($tableContent['content']), JSON_PRETTY_PRINT));
            }
        }
    }
}