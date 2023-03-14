<?php
namespace Controllers;
use Models\BranchOffice as BranchOfficeModels;

class BranchOffice extends BaseController
{
    public function branchOffice(): void{
        include_once __DIR__ . '/../views/branchOffice/branchOfficeForm.php';
    }
    public function processData(): bool{
        if(!empty($this->findErrors())){
            return false;
        }

        $branchOfficeModel = new BranchOfficeModels();
        $branchOfficeModel->name = $_POST['name'];
        $branchOfficeModel->address = $_POST['address'];
        $branchOfficeModel->products = $_POST['products'];

        $branchOfficeModel->savingData();

        return true;
    }
}