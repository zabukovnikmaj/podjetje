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
        view('employees/employeesForm', [
            'branchOffices' => Storage::loadElements('BranchOffice')
        ]);
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
                'branchOffices' => Storage::loadElements('BranchOffice')
                'formData' => $_POST
            ]);
            return;
        }

        $employeesModel = new EmployeesModel();
        $employeesModel->setBranchOffice(htmlspecialchars($_POST['branchOffice']));
        $employeesModel->setName(htmlspecialchars($_POST['name']));
        $employeesModel->setPosition(htmlspecialchars($_POST['position']));
        $employeesModel->setAge(htmlspecialchars(intval($_POST['age'])));
        $employeesModel->setSex(htmlspecialchars($_POST['sex']));
        $employeesModel->setEmail(htmlspecialchars($_POST['email']));
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
        $err['name'] = Validator::checkGeneral($_POST['name']);
        $err['position'] = Validator::checkGeneral($_POST['position']);
        $err['age'] = Validator::checkAge(intval($_POST['age']));
        $err['sex'] = Validator::checkSex($_POST['sex']);
        $err['email'] = Validator::checkEmail($_POST['email']);

        return $this->filterArray($err, "");
    }
}