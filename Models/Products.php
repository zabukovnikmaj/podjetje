<?php

namespace Models;

class Products extends BaseModel
{
    protected string $uuid;
    protected string $name;
    protected string $description;
    protected float $price;
    protected string $date;

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
     * setter for description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
            $this->description = $description;
    }

    /**
     * setter for price
     *
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * setter for date
     *
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
}