<?php

namespace Models;

class Employees
{
    public string $branchOffice;
    public string $name;
    public string $position;
    public int $age;
    public string $sex;
    public string $email;
    public function SavingData(array $data): void{
        $branchOffice = $data['branchOffice'];
        $name = $data['name'];
        $position = $data['position'];
        $age = intval($data['age']);
        $sex = $data['sex'];
        $email = $data['email'];
    }
}