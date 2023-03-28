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
        if (!strpos($email, "@")) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
        if ($price <= 0 || $price > 1000.00) {
            return false;
        }
        return true;
    }

    /**
     * function for checking general strings
     *
     * @param string $input
     * @return bool
     */
    public static function checkGeneral(string $input): bool
    {
        if (strlen($input) > 0 && strlen($input) < 50) {
            $regex = '/^[a-zA-Z\- ]+$/';
            return preg_match($regex, $input);
        } else {
            return false;
        }
    }

    /**
     * validator for limiting description length
     *
     * @param string $description
     * @return bool
     */
    public static function checkDescription(string $description): bool
    {
        if(strlen($description) > 1000){
            return false;
        }
        return true;
    }

    /**
     * validator for checking date validity
     *
     * @param string $date
     * @return bool
     */
    public static function checkDate(string $date): bool
    {
        $dateFromFormat = DateTime::createFromFormat('Y-m-d', $date);
        return $dateFromFormat && $dateFromFormat->format('Y-m-d') === $date;
    }

    /**
     * function for checking if all of the entered products already exist
     *
     * @param array $products
     * @return bool
     */
    public static function checkProducts(array $products): bool
    {
        //TODO: add validator for checking if all of the entered products already exist
        return true;
    }

    /**
     * funciton for checking if entered office already exists
     *
     * @param string $branchOffice
     * @return bool
     */
    public static function checkBranchOffice(string $branchOffice): bool
    {
        //TODO: add validator for checking if entered branch office already exist
        return true;
    }
}