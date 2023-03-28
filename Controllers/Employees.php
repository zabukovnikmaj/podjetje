<?php

namespace Controllers;

use Models\Employees as EmployeesModel;
use Services\Validator;

class Employees extends BaseController
{
    /**
     * function for displaying form
     *
     * @return void
     */
    public function showCreateForm(): void
    {
        view('employees/employeesForm');
    }
    /**
     * function for displaying existing data
     *
     * @return void
     */
    public function list(): void
    {
        view('employees/list');
    }
    /**
     * function for processing entered data and later saving it by using model
     *
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

        $employeesModel = new EmployeesModel();
        $employeesModel->setBranchOffice($_POST['branchOffice']);
        $employeesModel->setName($_POST['name']);
        $employeesModel->setPosition($_POST['position']);
        $employeesModel->setAge(intval($_POST['age']));
        $employeesModel->setSex($_POST['sex']);
        $employeesModel->setEmail($_POST['email']);
        $employeesModel->savingData();
        header('Location: /');
    }
}