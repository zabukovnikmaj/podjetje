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
        $directory = __DIR__ . '/../data/' . basename(get_class($this)) . '.json';
        $data = json_decode(file_get_contents($directory), true);
        $new_entry = [];

        foreach (get_object_vars($this) as $key => $value) {
            $new_entry[$key] = $value;
        }

        $data[] = $new_entry;
        file_put_contents($directory, json_encode($data, JSON_PRETTY_PRINT));
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
}