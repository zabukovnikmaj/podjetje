<?php

namespace Models;

class BranchOffice extends BaseModel
{
    protected string $name;
    protected string $address;
    protected array $products;

    /**
     * setter for name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * setter for address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * setter for products
     *
     * @param array $products
     * @return void
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }
}