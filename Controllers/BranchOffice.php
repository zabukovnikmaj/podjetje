<?php

namespace Controllers;

use Models\BranchOffice as BranchOfficeModels;
use Services\Validator;
use Services\Storage;

class BranchOffice extends BaseController
{
    /**
     * function for displaying form
     *
     * @return void
     */
    public function showCreateForm(): void
    {
        view('branchOffice/edit', [
            'products' => Storage::loadElements('Products'),
            'filteredData' => null
        ]);
    }

    /**
     * function for displaying existing data
     *
     * @return void
     */
    public function list(): void
    {
        $branchOffices = Storage::loadElements('BranchOffice');

        $officeIndex = 0;
        foreach ($branchOffices as $branchOffice){
            $productIndex = 0;
            foreach ($branchOffice['products'] as $product){
                $branchOffices[$officeIndex]['products'][$productIndex] = $this->getNameFromUuid('Products', $product);
                $productIndex++;
            }
            $officeIndex++;
        }

        view('branchOffice/list', [
            'branchOffices' => $branchOffices
            ]);
    }

    /**
     * function for processing entered data and later saving it by using model
     *
     * @return void
     */
    public function processData(): void
    {
        $err = Validator::required([], $_POST, 'name', 'address', 'products');
        if(empty($err)){
            $err = $this->validateData($err);
        }

        if (!empty($err)) {
            view('branchOffice/edit', [
                'err' => $err,
                'products' => Storage::loadElements('Products'),
            ]);
            return;
        }
        $branchOfficeModel = new BranchOfficeModels();
        $branchOfficeModel->setName($_POST['name']);
        $branchOfficeModel->setAddress($_POST['address']);
        var_dump($_POST['products']);
        $branchOfficeModel->setProducts($_POST['products']);
        $branchOfficeModel->setUuid();
        $branchOfficeModel->savingData();
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
        $err['address'] = Validator::checkGeneral($_POST['address']);
        return $this->filterArray($err, "");
    }

    /**
     * function for creating array from string
     *
     * @param string $products
     * @return string[]
     */
    protected function makeArray(string $products): array
    {
        if (strpos($products, ',')) {
            $productsArray = explode(", ", $products);
        } else {
            $productsArray = array($products);
        }
        return $productsArray;
    }
}