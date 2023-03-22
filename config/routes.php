<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Controllers\Employees;
use Controllers\Products;


return [
    '/' => [
        'GET' => [Index::class, 'index']
    ],
    '/branchOffices/create/' =>[
        'GET' => [BranchOffice::class, 'showCreateForm'],
        'POST' => [BranchOffice::class, 'processData']
    ],
    '/products/create/' => [
        'GET' => [Products::class, 'showCreateForm'],
        'POST' => [Products::class, 'processData']
    ],
    '/employees/create/' => [
        'GET' => [Employees::class, 'showCreateForm'],
        'POST' => [Employees::class, 'processData']
    ],
    '/employees/list/' => [
        'GET' => [Employees::class, 'list']
    ],
    '/branchOffice/list/' => [
        'GET' => [BranchOffice::class, 'list']
    ],
    '/products/list/' => [
        'GET' => [Products::class, 'list']
    ]
];