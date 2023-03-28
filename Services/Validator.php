<?php

namespace Services;

class Validator
{
    /**
     * function for checking $_POST array for certain methods and returning array with errors if fields are empty
     *
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

    /**
     * function for checking if age is inside accaptable range
     *
     * @param int $age
     * @param array $errors
     * @return array
     */
    public static function checkAge(int $age, array $errors): array
    {
        if (!($age >= 15 && $age <= 65)) {
            $errors[] = "Age needs to be between 15 and 65!";
        }
        return $errors;
    }

    /**
     * Validator for checking if entered sex was in valid format
     *
     * @param string $sex
     * @param array $errors
     * @return array
     */
    public static function checkSex(string $sex, array $errors): array
    {
        if (strtoupper($sex) != 'M' || strtoupper($sex) != "Ž") {
            $errors[] = "Sex can only be M or Ž!";
        }
        return $errors;
    }


}