<?php

namespace Controllers;

use Models\Products as ProductsModel;

class Products extends BaseController
{
    public function products(): void{
        include_once __DIR__ . '/../views/products/productForm.php';
    }

    public function processData(): void{
        if(!empty($this->findErrors())){
            return;
        }
        $productsModes = new ProductsModel();
        $productsModes->name = $_POST['name'];
        $productsModes->date = $_POST['deliveryDate'];
        $productsModes->price = floatval($_POST['price']);
        $productsModes->description = $_POST['description'];
        $productsModes->savingData();
    }
}