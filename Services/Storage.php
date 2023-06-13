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
                if (file_exists($dir)) {
                    if ($extension !== CONFIG['currentStorageMethod']) {
                        $tableContents[$tableName] = ['content' => file_get_contents($dir), 'extension' => $extension];
                        unlink($dir);
                    }
                }
            }
        }

        foreach ($tableContents as $key => $tableContent) {
            $extension = CONFIG['currentStorageMethod'];
            $dir = storage_path($key . '.' . $extension);

            if ($tableContent['extension'] === 'json') {
                file_put_contents($dir, xmlrpc_encode(json_decode($tableContent['content'])));
            } else if ($tableContent['extension'] === 'xml') {
                file_put_contents($dir, json_encode(xmlrpc_decode($tableContent['content'])));
            }
        }
    }

    /**
     * function for converting XML string to JSON
     *
     * @param string $xmlString
     * @return string
     * @throws \Exception
     */
    public static function convertXmlToJson(string $xmlString): string
    {
        $xmlData = xmlrpc_decode($xmlString);
        return json_encode($xmlData);
    }

    /**
     * function for converting JSON string to XML
     *
     * @param string $jsonString
     * @return string
     */
    public static function convertJsonToXml(string $jsonString): string
    {
        $data = json_decode($jsonString, true);

        $xmlString = '<?xml version="1.0" encoding="UTF-8"?><root>';

        foreach ($data as $item) {
            $xmlString .= '<item>';
            foreach ($item as $key => $value) {
                if (is_array($value)) {
                    $xmlString .= '<' . $key . '>';
                    foreach ($value as $val) {
                        $xmlString .= '<product>' . $val . '</product>';
                    }
                    $xmlString .= '</' . $key . '>';
                } else {
                    $xmlString .= '<' . $key . '>' . htmlspecialchars($value) . '</' . $key . '>';
                }
            }
            $xmlString .= '</item>';
        }

        $xmlString .= '</root>';

        $dom = new \DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlString);

        return $dom->saveXML();
    }
}