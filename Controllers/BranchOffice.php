<?php
namespace Controllers;
use Models\BranchOffice as BranchOfficeModels;

class BranchOffice extends BaseController
{
    public function branchOffice(): void{
        include_once __DIR__ . '/../views/branchOffice/branchOfficeForm.php';
    }
    public function processData(): void{
        if(!empty($this->findErrors())){
            return;
        }
        $branchOfficeModel = new BranchOfficeModels();
        $branchOfficeModel->name = $_POST['name'];
        $branchOfficeModel->address = $_POST['address'];
        $branchOfficeModel->products = explode(',', $_POST['products']);
        $branchOfficeModel->savingData();
    }
}