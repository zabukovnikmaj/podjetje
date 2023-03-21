<?php

namespace Services;

class Validator
{
    /**function for checking $_POST array for certain methods and returning array with errors if fields are empty
     * @param array $source
     * @param ...$fields
     * @return array
     */
    public static function required(array $source, ...$fields): array
    {
        $errors = [];

        foreach ($fields as $field) {
            if (empty($source[$field])) {
                $errors[$field] = "Field is empty";
            }
        }

        return $errors;
    }
}