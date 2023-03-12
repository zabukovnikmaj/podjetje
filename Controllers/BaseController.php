<?php

namespace Controllers;

abstract class BaseController
{
    public function findErrors(): array{
        $err = [];
        foreach($_POST as $key => $value){
            if(empty($value)){
                $err[] = "The value of " . $key . ' cannot be empty!';
            }
        }
        var_dump($err);
        return $err;
    }
}