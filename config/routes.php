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


    '/branchOffice/delet/' => [
        'DELETE' => [BranchOffice::class, 'deleteItem']
    ],
    '/employees/delet/' => [
        'DELETE' => [Employees::class, 'deleteItem']
    ],
    '/products/delet/' => [
        'DELETE' => [Products::class, 'deleteItem']
    ],


    '/api/branchOffice/' => [
        'GET' => [BranchOffice::class, 'apiData']
    ],
    '/api/employees/' => [
        'GET' => [Employees::class, 'apiData']
    ],
    '/api/products/' => [
        'GET' => [Products::class, 'apiData']
    ],


    '/branchOffice/edit/' => [
        'GET' => [BranchOffice::class, 'displayEditItem'],
        'PUT' => [BranchOffice::class, 'saveEditedData']
    ],
    '/employees/edit/' => [
        'GET' => [Employees::class, 'displayEditItem'],
        'PUT' => [Employees::class, 'saveEditedData']
    ],
    '/products/edit/' => [
        'GET' => [Products::class, 'displayEditItem'],
        'PUT' => [Products::class, 'saveEditedData']
    ]
];