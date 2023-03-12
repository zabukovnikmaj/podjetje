<?php

namespace Controllers;

class Employees
{
    public function employees(): void{
        include_once __DIR__ . '/../views/employees/employeesForm.php';
    }
}