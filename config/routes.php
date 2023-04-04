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
    ],
    '/branchOffice/delete' => [
        'GET' => [BranchOffice::class, 'deleteItem']
    ],
    '/employees/delete' => [
        'GET' => [Employees::class, 'deleteItem']
    ],
    '/products/delete' => [
        'GET' => [Products::class, 'deleteItem']
    ],
    '/branchOffice/edit' => [
        'GET' => [BranchOffice::class, 'displayEditItem']
    ],
    '/employees/edit' => [
        'GET' => [Employees::class, 'displayEditItem']
    ],
    '/products/edit' => [
        'GET' => [Products::class, 'displayEditItem']
    ]
];