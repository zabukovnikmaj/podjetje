<?php

namespace Models;

use InvalidArgumentException;
use Services\Validator;

class Products extends BaseModel
{
    public string $name;
    public string $description;
    public float $price;
    public string $date;

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
            throw new InvalidArgumentException("Invalid name: $name");
        }
    }

    /**
     * setter for description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        if (Validator::checkDescription($description)) {
            $this->description = $description;
        } else {
            throw new InvalidArgumentException("Invalid name: $description");
        }
    }

    /**
     * setter for price
     *
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void
    {
        if (Validator::checkPrice($price)) {
            $this->price = $price;
        } else {
            throw new InvalidArgumentException("Invalid name: $price");
        }
    }

    /**
     * setter for date
     *
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void
    {
        if (Validator::checkDate($date)) {
            $this->date = $date;
        } else {
            throw new InvalidArgumentException("Invalid name: $date");
        }
    }
}