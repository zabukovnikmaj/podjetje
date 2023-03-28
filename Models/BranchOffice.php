<?php

namespace Models;

use InvalidArgumentException;
use Services\Validator;

class BranchOffice extends BaseModel
{
    public string $name;
    public string $address;
    public array $products;

    /**
     * setter for name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        if (Validator::checkGeneral($name)) {
            $this->name = $name;
        } else {
            throw new InvalidArgumentException("Invalid title: $name");
        }
    }

    /**
     * setter for address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address): void
    {
        if (Validator::checkGeneral($address)) {
            $this->address = $address;
        } else {
            throw new InvalidArgumentException("Invalid title: $address");
        }
    }

    /**
     * setter for products
     *
     * @param array $products
     * @return void
     */
    public function setProducts(array $products): void
    {
        if (Validator::checkProducts($products)) {
            $this->products = $products;
        } else {
            throw new InvalidArgumentException("Invalid title: " . strval($products));
        }
    }
}