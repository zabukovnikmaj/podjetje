<?php

namespace Models;

abstract class BaseModel
{
    /**
     * @return void
     * generalized method for saving all data from class variables to .json file with the same name as class
     */
    public function savingData(): void
    {
        $directory = __DIR__ . '/../data/' . basename(get_class($this)) . '.json';
        $data = json_decode(file_get_contents($directory), true);
        $new_entry = [];
        foreach (get_object_vars($this) as $key => $value) {
            if (is_array($value)) {
                $array = [];
                foreach ($value as $item) {
                    if (!empty($item)) {
                        $array[] = $item;
                    }
                }
                $value = $array;
            }
            $new_entry[$key] = $value;
        }
        $data[] = $new_entry;
        file_put_contents($directory, json_encode($data, JSON_PRETTY_PRINT));
    }
}