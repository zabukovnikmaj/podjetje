<?php

namespace Controllers;

use Services\Storage;

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
        return array_filter($array, function($value) use ($filterBy) {
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

        foreach ($existingData as $item){
            if($item['uuid'] != $_GET['id']){
                $newData[] = $item;
            }
        }

        Storage::saveElements($filename, $newData);
        header('Location: /' . strtolower(substr($filename, 0, 1)) . substr($filename, 1) . '/list/');
    }
}