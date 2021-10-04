<?php

namespace App\Entity;

use App\Repository\ItemsAtAuctionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemsAtAuctionRepository::class)
 */
class ItemsAtAuction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auctionAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sellerName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAuctionAddress(): ?string
    {
        return $this->auctionAddress;
    }

    public function setAuctionAddress(string $auctionAddress): self
    {
        $this->auctionAddress = $auctionAddress;

        return $this;
    }

    public function getSellerName(): ?string
    {
        return $this->sellerName;
    }

    public function setSellerName(string $sellerName): self
    {
        $this->sellerName = $sellerName;

        return $this;
    }
}
