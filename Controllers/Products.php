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
        header('Location: /');
        $productsModes = new ProductsModel();
        $productsModes->name = $_POST['name'];
        $productsModes->date = $_POST['deliveryDate'];
        $productsModes->price = floatval($_POST['price']);
        $productsModes->description = $_POST['description'];
        $productsModes->savingData();
    }
}