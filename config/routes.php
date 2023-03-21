<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Controllers\Employees;
use Controllers\Products;


return [
    '/' => [
        'GET' => [Index::class, 'index']
    ],
    '/branchOffice/create/' =>[
        'GET' => [BranchOffice::class, 'branchOffice'],
        'POST' => [BranchOffice::class, 'processData']
    ],
    '/products/create/' => [
        'GET' => [Products::class, 'products'],
        'POST' => [Products::class, 'processData']
    ],
    '/employees/create/' => [
        'GET' => [Employees::class, 'employees'],
        'POST' => [Employees::class, 'processData']
    ],
    '/employees/list/' => [],
    '/branchOffice/list/' => [],
    '/products/list/' => []
];