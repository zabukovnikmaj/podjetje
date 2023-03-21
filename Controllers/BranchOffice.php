<?php

namespace Controllers;

use Models\BranchOffice as BranchOfficeModels;
use Services\Validator;

class BranchOffice extends BaseController
{
    public function showCreateForm(array $err = []): void
    {
        view('branchOffice/branchOfficeForm');
    }

    public function list(): void
    {
        view('branchOffice/list');
    }

    public function processData(): void
    {
        $err = Validator::required($_POST, 'name', 'address', 'products');
        if (!empty($err)) {
            view('branchOffice/branchOfficeForm', [
                'errors' => $err
            ]);
            return;
        }
        header('Location: /');
        $branchOfficeModel = new BranchOfficeModels();
        $branchOfficeModel->name = $_POST['name'];
        $branchOfficeModel->address = $_POST['address'];
        $branchOfficeModel->products = explode(', ', $_POST['products']);
        $branchOfficeModel->savingData();
    }
}