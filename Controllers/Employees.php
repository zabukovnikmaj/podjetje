<?php

namespace Controllers;

use Models\Employees as EmployeesModel;
use Services\Validator;

class Employees extends BaseController
{
    public function showCreateForm(): void
    {
        view('employees/employeesForm');
    }

    public function list(): void
    {
        view('employees/list');
    }

    public function processData(): void
    {
        $err = Validator::required($_POST, 'branchOffice', 'name', 'position', 'age', 'sex', 'email');
        if (!empty($err)) {
            view('employees/employeesForm', [
                'errors' => $err
            ]);
            return;
        }
        header('Location: /');
        $employeesModel = new EmployeesModel();
        $employeesModel->branchOffice = $_POST['branchOffice'];
        $employeesModel->name = $_POST['name'];
        $employeesModel->position = $_POST['position'];
        $employeesModel->age = intval($_POST['age']);
        $employeesModel->sex = $_POST['sex'];
        $employeesModel->email = $_POST['email'];
        $employeesModel->savingData();
    }
}