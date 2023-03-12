<?php

namespace Controllers;

class Index
{
    public function index(): void{
        include_once __DIR__ . '/../views/index/index.php';
    }
}