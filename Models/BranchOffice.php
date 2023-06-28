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
     * Setter for uuid
     *
     * @return void
     * @throws \Exception
     */
    public function setUuid(): void
    {
        $this->uuid = $this->getUuid();
    }

    /**
     * Setter for name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Setter for address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * Setter for products
     *
     * @param array $products
     * @return void
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }
}