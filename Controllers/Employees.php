<?php

namespace Controllers;

use Models\Employees as EmployeesModel;
use Services\Storage;
use Services\Validator as Validator;

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
        $emoployees = Storage::loadElements('Employees');
        view('employees/list', [
            'employees' => $emoployees
        ]);
    }
    /**
     * function for processing entered data and later saving it by using model
     *
     * @return void
     */
    public function processData(): void
    {
        $err = Validator::required([], $_POST, 'branchOffice', 'name', 'position', 'age', 'sex', 'email');
        $err = $this->validateData($err);
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
        $employeesModel->setUuid();
        $employeesModel->savingData();
        header('Location: /');
    }

    /**
     * function for checking validity of entered arguments
     *
     * @param array $err
     * @return array
     */
    protected function validateData(array $err): array
    {
        $err[] = Validator::checkBranchOffice($_POST['branchOffice']);
        $err[] = Validator::checkGeneral($_POST['name']);
        $err[] = Validator::checkGeneral($_POST['position']);
        $err[] = Validator::checkAge(intval($_POST['age']));
        $err[] = Validator::checkSex($_POST['sex']);
        $err[] = Validator::checkEmail($_POST['email']);

        return $this->filterArray($err, "");
    }
}