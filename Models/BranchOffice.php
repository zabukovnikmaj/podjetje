<?php

namespace Models;

class BranchOffice
{
    public string $name;
    public string $address;
    public array $products;

    public function SavingData($data): void{
        $name = $data['name'];
        $address = $data['address'];
        $products = $data['products'];
    }
}