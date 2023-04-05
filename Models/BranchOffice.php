<?php

namespace Models;

use Services\Storage;

class BranchOffice extends BaseModel
{
    protected string $uuid;
    protected string $name;
    protected string $address;
    protected array $products;

    /**
     * setter for uuid
     *
     * @return void
     */
    public function setUuid(): void
    {
        $this->uuid = $this->getUuid();
    }

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