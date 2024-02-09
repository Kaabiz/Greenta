<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column]
    private ?int $product_quantity = null;

    #[ORM\Column(length: 255)]
    private ?string $product_size = null;

    #[ORM\Column]
    private ?float $product_price = null;

    #[ORM\Column(length: 255)]
    private ?string $product_description = null;

    #[ORM\Column(length: 255)]
    private ?string $product_disponibility = null;

    #[ORM\ManyToOne(inversedBy: 'product_name')]
    private ?Cart $cart = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getProductQuantity(): ?int
    {
        return $this->product_quantity;
    }

    public function setProductQuantity(int $product_quantity): static
    {
        $this->product_quantity = $product_quantity;

        return $this;
    }

    public function getProductSize(): ?string
    {
        return $this->product_size;
    }

    public function setProductSize(string $product_size): static
    {
        $this->product_size = $product_size;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->product_price;
    }

    public function setProductPrice(float $product_price): static
    {
        $this->product_price = $product_price;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->product_description;
    }

    public function setProductDescription(string $product_description): static
    {
        $this->product_description = $product_description;

        return $this;
    }

    public function getProductDisponibility(): ?string
    {
        return $this->product_disponibility;
    }

    public function setProductDisponibility(string $product_disponibility): static
    {
        $this->product_disponibility = $product_disponibility;

        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): static
    {
        $this->cart = $cart;

        return $this;
    }
}
