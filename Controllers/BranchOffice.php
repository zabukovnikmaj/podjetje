<?php

namespace Controllers;

use Models\BranchOffice as BranchOfficeModels;
use Services\Validator;

class BranchOffice extends BaseController
{
    /**
     * function for displaying form
     *
     * @return void
     */
    public function showCreateForm(): void
    {
        view('branchOffice/branchOfficeForm');
    }

    /**
     * function for displaying existing data
     *
     * @return void
     */
    public function list(): void
    {
        view('branchOffice/list');
    }
    /**
     * function for processing entered data and later saving it by using model
     *
     * @return void
     */
    public function processData(): void
    {
        $err = Validator::required($_POST, 'name', 'address', 'products');
        if (!empty($err)) {
            view('branchOffice/branchOfficeForm', [
                'errors' => $err
            ]);
            return;
        }

        $branchOfficeModel = new BranchOfficeModels();
        $branchOfficeModel->setName($_POST['name']);
        $branchOfficeModel->setAddress($_POST['address']);
        $branchOfficeModel->setProducts(explode(', ', $_POST['products']));
        $branchOfficeModel->savingData();
        header('Location: /');
    }
}