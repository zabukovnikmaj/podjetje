<?php

use Controllers\Index;
use Controllers\BranchOffice;
use Models\BranchOffice;

return [
    '/' => [
        Index::class, "index"
    ],
    '/branchOffice' =>[
        'GET' => [BranchOffice::class, ""]
    ]
];