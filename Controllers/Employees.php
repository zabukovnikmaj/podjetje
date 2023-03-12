<?php

namespace Controllers;
use Models\Employees as EmployeesModel;

class Employees extends BaseController
{
    public function employees(): void{
        include_once __DIR__ . '/../views/employees/employeesForm.php';
    }
    public function processData(): bool{
        if(!empty($this->findErrors()){
            return false;
        }

        $employeesModel = new EmployeesModel();
        $employeesModel->branchOffice = $_POST['branchOffice'];
        $employeesModel->name = $_POST['name'];
        $employeesModel->position = $_POST['position'];
        $employeesModel->age = intval($_POST['age']);
        $employeesModel->sex = $_POST['sex'];
        $employeesModel->email = $_POST['email'];

        return true;
    }
}