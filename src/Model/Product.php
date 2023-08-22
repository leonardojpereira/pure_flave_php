<?php

class Product
{
    private ?int $id;
    private string $name;
    private string $image;
    private float $price;

    public function __construct(?int $id, string $name, float $price, string $image = "default_image.png")
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    public function getImageDirectoy(): string {
        return "assets/img/" . $this->image;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getFormatedPrice(): string {
        return "R$ " . number_format($this->price, 2);
    }
}
