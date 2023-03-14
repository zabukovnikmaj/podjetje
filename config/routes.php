<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Controllers\Employees;
use Controllers\Products;


return [
    '/' => [
        'GET' => [Index::class, 'index']
    ],
    '/branchOffice' =>[
        'GET' => [BranchOffice::class, 'branchOffice'],
        'POST' => [BranchOffice::class, 'processData']
    ],
    '/products' => [
        'GET' => [Products::class, 'products'],
        'POST' => [Products::class, 'processData']
    ],
    '/employees' => [
        'GET' => [Employees::class, 'employees'],
        'POST' => [Employees::class, 'processData']
    ]
];