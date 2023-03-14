<?php

namespace Controllers;

abstract class BaseController
{
    /**
     * @return array
     * general method for checking if any of $_POST elements are empty and returning array of errors
     */
    public function findErrors(): array{
        $err = [];
        foreach($_POST as $key => $value){
            if(empty($value)){
                $err[] = "The value of " . $key . ' cannot be empty!';
            }
        }
        return $err;
    }
}