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
     * @return bool
     */
    public static function checkAge(int $age): bool
    {
        if (!($age >= 15 && $age <= 65)) {
            return false;
        }
        return true;
    }

    /**
     * Validator for checking if entered sex was in valid format
     *
     * @param string $sex
     * @return bool
     */
    public static function checkSex(string $sex): bool
    {
        if (strtoupper($sex) != 'M' || strtoupper($sex) != "Ž") {
            return false;
        }
        return true;
    }

    /**
     * function for checking if email contains @ and if it doesn't contain any whitespaces
     *
     * @param string $email
     * @return bool
     */
    public static function checkEmail(string $email): bool
    {
        if(!strpos($email, "@")){
            return false;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

    /**
     * function for checking if price is positive and smaller then 1000
     *
     * @param float $price
     * @return bool
     */
    public static function checkPrice(float $price): bool
    {
        if($price <= 0 || $price > 1000.00){
            return false;
        }
        return true;
    }
}