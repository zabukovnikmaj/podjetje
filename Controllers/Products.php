<?php

namespace Controllers;

class Products
{
    public function products(): void{
        include_once __DIR__ . '/../views/products/productForm.php';
    }
}