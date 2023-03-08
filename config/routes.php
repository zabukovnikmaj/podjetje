<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Controllers\Employees;
use Controllers\BranchOffice;


return [
    '/' => [
        Index::class, "index"
    ],
    '/branchOffice' =>[
        'GET' => [BranchOffice::class, ""]
    ]
];