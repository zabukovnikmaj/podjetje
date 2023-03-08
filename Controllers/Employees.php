<?php

namespace Controllers;

class Employees
{
    public function emplyees(): void{
        include_once __DIR__ . '/../views/employees/employeesForm.php';
    }
}