<?php

namespace Models;

class BranchOffice extends BaseModel
{
    public string $name;
    public string $address;
    public array $products;

        //TODO: all letters should be lowercase for classes and methods, consistency, do not duplicate code -  base model
}