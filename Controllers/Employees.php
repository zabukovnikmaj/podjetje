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
        $employees = Storage::loadElements('Employees');

        $employeesIndex = 0;
        foreach ($employees as $employee){
            $employees[$employeesIndex]['branchOffice'] = $this->getNameFromUuid('BranchOffice', $employee['branchOffice']);
            $employeesIndex++;
        }

        view('employees/list', [
            'employees' => $employees
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
        if(empty($err)){
            $err = $this->validateData($err);
        }

        if (!empty($err)) {
            view('employees/employeesForm', [
                'err' => $err,
                'formData' => $_POST
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
        $err['branchOffice'] = Validator::checkBranchOffice($_POST['branchOffice']);
        $err['name'] = Validator::checkGeneral($_POST['name']);
        $err['position'] = Validator::checkGeneral($_POST['position']);
        $err['age'] = Validator::checkAge(intval($_POST['age']));
        $err['sex'] = Validator::checkSex($_POST['sex']);
        $err['email'] = Validator::checkEmail($_POST['email']);

        return $this->filterArray($err, "");
    }
}