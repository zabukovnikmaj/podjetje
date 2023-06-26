<?php

namespace Controllers;

use Models\BranchOffice as BranchOfficeModels;
use Services\Validator;
use Services\Storage;

class BranchOffice extends BaseController
{
    /**
     * Function for displaying form
     *
     * @return void
     */
    public function showCreateForm(): string
    {
        return view('branchOffice/edit', [
            'products' => Storage::loadElements('Products'),
            'filteredData' => null
        ]);
    }

    /**
     * Function for displaying existing data
     *
     * @return string
     */
    public function list(): string
    {
        $branchOffices = Storage::loadElements('BranchOffice', true);

        $officeIndex = 0;
        foreach ($branchOffices as $branchOffice) {
            $productIndex = 0;

            if(!is_array($branchOffice['products'])){
                $branchOffices[$officeIndex]['products'] = explode(',', $branchOffice['products']);
                $branchOffice['products'] = explode(',', $branchOffice['products']);
            }

            foreach ($branchOffice['products'] as $product) {
                $branchOffices[$officeIndex]['products'][$productIndex] = $this->getNameFromUuid('Products', $product);
                $productIndex++;
            }
            $officeIndex++;
        }

        return view('branchOffice/list', [
            'branchOffices' => $branchOffices
        ]);
    }

    /**
     * Function for processing entered data and later saving it by using model
     *
     * @return string
     * @throws \Exception
     */
    public function processData(): string
    {
        $err = Validator::required([], $_POST, 'name', 'address', 'products');
        if (empty($err)) {
            $err = $this->validateData($err);
        }

        if (!empty($err)) {
            return view('branchOffice/edit', [
                'err' => $err,
                'products' => Storage::loadElements('Products'),
            ]);
        }

        $branchOfficeModel = new BranchOfficeModels();
        $branchOfficeModel->setName($_POST['name']);
        $branchOfficeModel->setAddress($_POST['address']);
        $branchOfficeModel->setProducts($_POST['products']);
        $branchOfficeModel->setUuid();
        $branchOfficeModel->savingData();
        redirect('/');
        return '';
    }

    /**
     * Function for checking validity of entered arguments
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
     * Function for creating array from string
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