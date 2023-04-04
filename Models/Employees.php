<?php

namespace Models;

class Employees extends BaseModel
{
    protected string $branchOffice;
    protected string $name;
    protected string $position;
    protected int $age;
    protected string $sex;
    protected string $email;

    /**
     * setter for branch office
     *
     * @param string $branchOffice
     * @return void
     */
    public function setBranchOffice(string $branchOffice): void
    {
        $this->branchOffice = $branchOffice;
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
     * setter for position
     *
     * @param string $position
     * @return void
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * setter for age
     *
     * @param int $age
     * @return void
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * setter for sex
     *
     * @param string $sex
     * @return void
     */
    public function setSex(string $sex): void
    {
        $this->sex = $sex;
    }

    /**
     * setter for email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}