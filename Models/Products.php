<?php

namespace Models;

class Products extends BaseModel
{
    public string $name;
    public string $description;
    public double $price;
    public string $date;
}