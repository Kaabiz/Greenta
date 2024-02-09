<?php

namespace App\Entity;

use App\Repository\CartRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $cart_quantity = null;

    #[ORM\Column]
    private ?DateTimeImmutable $addition_date = null;

    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'cart')]
    private Collection $product_name;

    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'cart')]
    private Collection $product_id;

    public function __construct()
    {
        $this->product_name = new ArrayCollection();
        $this->product_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartQuantity(): ?int
    {
        return $this->cart_quantity;
    }

    public function setCartQuantity(int $cart_quantity): static
    {
        $this->cart_quantity = $cart_quantity;

        return $this;
    }

    public function getAdditionDate(): ?DateTimeImmutable
    {
        return $this->addition_date;
    }

    public function setAdditionDate(DateTimeImmutable $addition_date): static
    {
        $this->addition_date = $addition_date;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductName(): Collection
    {
        return $this->product_name;
    }

    public function addProductName(Product $productName): static
    {
        if (!$this->product_name->contains($productName)) {
            $this->product_name->add($productName);
            $productName->setCart($this);
        }

        return $this;
    }

    public function removeProductName(Product $productName): static
    {
        if ($this->product_name->removeElement($productName)) {
            // set the owning side to null (unless already changed)
            if ($productName->getCart() === $this) {
                $productName->setCart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(Product $productId): static
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id->add($productId);
            $productId->setCart($this);
        }

        return $this;
    }

    public function removeProductId(Product $productId): static
    {
        if ($this->product_id->removeElement($productId)) {
            // set the owning side to null (unless already changed)
            if ($productId->getCart() === $this) {
                $productId->setCart(null);
            }
        }

        return $this;
    }
}
