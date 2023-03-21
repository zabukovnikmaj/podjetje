<?php

namespace Controllers;

use Models\Employees as EmployeesModel;
use Services\Validator;

class Employees extends BaseController
{
    /**
     * function for displaying form
     * @return void
     */
    public function showCreateForm(): void
    {
        view('employees/employeesForm');
    }
    /**
     * function for displaying existing data
     * @return void
     */
    public function list(): void
    {
        view('employees/list');
    }
    /**
     * function for processing entered data and later saving it by using model
     * @return void
     */
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