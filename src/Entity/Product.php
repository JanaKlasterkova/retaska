<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Name;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;
    /**
     * @ORM\Column(type="text")
     */
    private $Detail;
    /**
     * @ORM\Column(type="string")
     */
    private $Sklad;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ordr", mappedBy="Product")
     */
    private $Ordr;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Category;

    public function __construct()
    {
        $this->Ordr = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
    public function getDetail(): ?string
    {
        return $this->Detail;
    }

    public function setDetail(string $Detail): self
    {
        $this->Detail = $Detail;

        return $this;
    }
    public function getSklad(): ?string
    {
        return $this->Sklad;
    }

    public function setSklad(string $Sklad): self
    {
        $this->Sklad = $Sklad;

        return $this;
    }

    /**
     * @return Collection|Ordr[]
     */
    public function getOrdr(): Collection
    {
        return $this->Ordr;
    }

    public function addOrdr(Ordr $ordr): self
    {
        if (!$this->Ordr->contains($ordr)) {
            $this->Ordr[] = $ordr;
            $ordr->setProduct($this);
        }

        return $this;
    }

    public function removeOrdr(Ordr $ordr): self
    {
        if ($this->Ordr->contains($ordr)) {
            $this->Ordr->removeElement($ordr);
            // set the owning side to null (unless already changed)
            if ($ordr->getProduct() === $this) {
                $ordr->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }
}
