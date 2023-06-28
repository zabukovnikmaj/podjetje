<?php

namespace Models;

class Employees extends BaseModel
{
    protected string $uuid;
    protected string $branchOffice;
    protected string $name;
    protected string $position;
    protected int $age;
    protected string $sex;
    protected string $email;

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
     * Setter for branch office
     *
     * @param string $branchOffice
     * @return void
     */
    public function setBranchOffice(string $branchOffice): void
    {
        $this->branchOffice = $branchOffice;
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
     * Setter for position
     *
     * @param string $position
     * @return void
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * Setter for age
     *
     * @param int $age
     * @return void
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * Setter for sex
     *
     * @param string $sex
     * @return void
     */
    public function setSex(string $sex): void
    {
        $this->sex = strtolower($sex);
    }

    /**
     * Setter for email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Getter for returning existing uuid
     *
     * @return string
     */
    public function getExistingUuid(): string {
        return $this->uuid;
    }
}