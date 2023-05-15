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
        'DELETE' => [BranchOffice::class, 'deleteItem']
    ],
    '/employees/delete' => [
        'DELETE' => [Employees::class, 'deleteItem']
    ],
    '/products/delete' => [
        'DELETE' => [Products::class, 'deleteItem']
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