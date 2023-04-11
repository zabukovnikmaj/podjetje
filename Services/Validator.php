<?php

namespace Services;

use DateTime;

class Validator
{
    /**
     * function for checking $_POST array for certain methods and returning array with errors if fields are empty
     *
     * @param array $errors
     * @param array $source
     * @param ...$fields
     * @return array
     */
    public static function required(array $errors, array $source, ...$fields): array
    {
        $errors = [];
        foreach ($fields as $field) {
            if (empty($source[$field])) {
                $errors[$field] = $field . " is empty";
            }
        }

        return $errors;
    }

    /**
     * function for checking if age is inside accaptable range
     *
     * @param int $age
     * @return string
     */
    public static function checkAge(int $age): string
    {
        if (!($age >= 15 && $age <= 65)) {
            return "Age is not within acceptable range!";
        }
        return "";
    }

    /**
     * Validator for checking if entered sex was in valid format
     *
     * @param string $sex
     * @return string
     */
    public static function checkSex(string $sex): string
    {
        if (strtoupper($sex) != 'M' && strtoupper($sex) != "Ž") {
            return "Sex is not in correct format!";
        }
        return "";
    }

    /**
     * function for checking if email contains @ and if it doesn't contain any whitespaces
     *
     * @param string $email
     * @return string
     */
    public static function checkEmail(string $email): string
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email is not in correct format!";
        }
        return "";
    }

    /**
     * function for checking if price is positive and smaller then 1000
     *
     * @param float $price
     * @return string
     */
    public static function checkPrice(float $price): string
    {
        if ($price <= 0 || $price > 1000.00) {
            return "The price has to be a number between 0 and 1000!";
        }
        return "";
    }

    /**
     * function for checking general strings
     *
     * @param string $input
     * @return string
     */
    public static function checkGeneral(string $input): string
    {
        if (!(strlen($input) > 0 && strlen($input) < 50)) {
            return "Input is too long!";
        }
        return "";
    }

    /**
     * validator for limiting description length
     *
     * @param string $description
     * @return string
     */
    public static function checkDescription(string $description): string
    {
        if(strlen($description) > 1000){
            return "The description is too long!";
        }
        return "";
    }

    /**
     * validator for checking date validity
     *
     * @param string $date
     * @return string
     */
    public static function checkDate(string $date): string
    {
        $dateFromFormat = DateTime::createFromFormat('Y-m-d', $date);
        if(!($dateFromFormat && $dateFromFormat->format('Y-m-d') === $date)){
            return "Date is in the wrong format!";
        }
        return "";
    }

    /**
     * function for checking if all the entered products already exist
     *
     * @param array $products
     * @return string
     */
    public static function checkProducts(array $products): string
    {
        $data = Storage::loadElements("Products");
        $foundMatches = [];
        foreach ($data as $element){
            if (in_array($element['uuid'], $products)) {
                $foundMatches[] = $element['uuid'];
            }
        }
        if(count($foundMatches) === count($products)){
            return "";
        }
        return "One or more of the entered products do not exists in database!";
    }

    /**
     * funciton for checking if entered office already exists
     *
     * @param string $branchOffice
     * @return string
     */
    public static function checkBranchOffice(string $branchOffice): string
    {
        $data = Storage::loadElements("BranchOffice");
        foreach ($data as $element){
            if ($element['uuid'] === $branchOffice) {
                return "";
            }
        }
        return "One or more of the entered branch offices do not exists in database!";
    }
}