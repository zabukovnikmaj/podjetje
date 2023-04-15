<?php

namespace Controllers;

use Models\Products as ProductsModel;
use Services\Storage;
use Services\Validator as Validator;

class Products extends BaseController
{
    /**
     * function for displaying form
     *
     * @return void
     */
    public function showCreateForm(): void
    {
        view('products/productForm');
    }
    /**
     * function for displaying existing data
     *
     * @return void
     */
    public function list(): void
    {
        $products = Storage::loadElements('Products');
        view('products/list', [
            'products' => $products
        ]);
    }

    /**
     * function for processing entered data and later saving it by using model
     *
     * @return void
     */
    public function processData(): void
    {
        $err = Validator::required([], $_POST, 'name', 'description', 'price', 'deliveryDate');
        if(empty($err)){
            $err = $this->validateData($err);
        }

        if (!empty($err)) {
            view('products/productForm', [
                'err' => $err
            ]);
            return;
        }

        $productsModes = new ProductsModel();
        $productsModes->setName($_POST['name']);
        $productsModes->setDate($_POST['deliveryDate']);
        $productsModes->setPrice(floatval($_POST['price']));
        $productsModes->setDescription($_POST['description']);
        $productsModes->setUuid();
        $productsModes->savingData();
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
        $err['description'] = Validator::checkDescription($_POST['description']);
        $err['price'] = Validator::checkPrice(floatval($_POST['price']));
        $err['deliveryDate'] = Validator::checkDate($_POST['deliveryDate']);

        return $this->filterArray($err, "");
    }
}