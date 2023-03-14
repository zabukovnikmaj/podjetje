<?php

namespace Controllers;

use Models\Products as ProductsModel;

class Products extends BaseController
{
    public function products(array $err = []): void{
        include_once __DIR__ . '/../views/products/productForm.php';
    }

    public function processData(): void{
        $err = $this->findErrors();
        if(!empty($err)){
            $this->products($err);
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