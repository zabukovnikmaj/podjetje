<?php

namespace Models;

class Products extends BaseModel
{
    public string $name;
    public string $description;
    public double $price;
    public string $date;
    public function SavingData(array $data): void{
        $name = $data['name'];
        $description = $data['description'];
        $price = doubleval($data['price']);
        $date = $data['date'];
    }
}