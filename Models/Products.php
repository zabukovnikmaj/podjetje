<?php

namespace Models;

class Products extends BaseModel
{
    protected string $uuid;
    protected string $name;
    protected string $description;
    protected float $price;
    protected string $date;
    protected string $fileType;

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
     * Setter for FileType
     *
     * @param string $type
     * @return void
     */
    public function setFileType(string $type): void
    {
        $this->fileType = $type;
    }

    /**
     * Setter for description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Setter for price
     *
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * Setter for date
     *
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
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