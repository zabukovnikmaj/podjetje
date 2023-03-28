<?php

namespace Controllers;

use Models\Products as ProductsModel;
use Services\Validator;

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
        view('products/list');
    }

    /**
     * function for processing entered data and later saving it by using model
     *
     * @return void
     */
    public function processData(): void
    {
        $err = Validator::required($_POST, 'name', 'description', 'price', 'deliveryDate');
        if (!empty($err)) {
            view('products/productForm', [
                'errors' => $err
            ]);
            return;
        }

        $productsModes = new ProductsModel();
        $productsModes->setName($_POST['name']);
        $productsModes->setDate($_POST['deliveryDate']);
        $productsModes->setPrice(floatval($_POST['price']));
        $productsModes->setDescription($_POST['description']);
        $productsModes->savingData();
        header('Location: /');
    }
}