<?php

namespace Models;

use InvalidArgumentException;
use Services\Validator;

class Employees extends BaseModel
{
    public string $branchOffice;
    public string $name;
    public string $position;
    public int $age;
    public string $sex;
    public string $email;

    /**
     * setter for branch office
     *
     * @param string $branchOffice
     * @return void
     */
    public function setBranchOffice(string $branchOffice): void
    {
        if (Validator::checkBranchOffice($branchOffice)) {
            $this->branchOffice = $branchOffice;
        } else {
            throw new InvalidArgumentException("Invalid name: $branchOffice");
        }
    }

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
     * setter for position
     *
     * @param string $position
     * @return void
     */
    public function setPosition(string $position): void
    {
        if (Validator::checkGeneral($position)) {
            $this->position = $position;
        } else {
            throw new InvalidArgumentException("Invalid name: $position");
        }
    }

    /**
     * setter for age
     *
     * @param int $age
     * @return void
     */
    public function setAge(int $age): void
    {
        if (Validator::checkAge($age)) {
            $this->age = $age;
        } else {
            throw new InvalidArgumentException("Invalid name: " . strval($age));
        }
    }

    /**
     * setter for sex
     *
     * @param string $sex
     * @return void
     */
    public function setSex(string $sex): void
    {
        if (Validator::checkSex($sex)) {
            $this->sex = $sex;
        } else {
            throw new InvalidArgumentException("Invalid name: $sex");
        }
    }

    /**
     * setter for email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        if (Validator::checkEmail($email)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("Invalid name: $email");
        }
    }
}