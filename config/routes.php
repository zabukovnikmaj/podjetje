<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Controllers\Employees;
use Controllers\Products;


return [
    '/' => [
        Index::class, "index"
    ],
    '/branchOffice' =>[
        'GET' => [BranchOffice::class, "branchOffice"]
    ],
    '/products' => [
        'GET' => [Products::class, 'products']
    ],
    '/employees' => [
        'GET' => [Employees::class, 'employees']
    ]
];