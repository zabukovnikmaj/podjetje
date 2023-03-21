<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Controllers\Employees;
use Controllers\Products;


return [
    '/' => [
        'GET' => [Index::class, 'index']
    ],
    '/branchOffice/display/' =>[
        'GET' => [BranchOffice::class, 'branchOffice'],
        'POST' => [BranchOffice::class, 'processData']
    ],
    '/products/display/' => [
        'GET' => [Products::class, 'products'],
        'POST' => [Products::class, 'processData']
    ],
    '/employees/display/' => [
        'GET' => [Employees::class, 'employees'],
        'POST' => [Employees::class, 'processData']
    ]
];