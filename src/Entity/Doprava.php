<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DopravaRepository")
 */
class Doprava
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $Price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ordr", mappedBy="doprava")
     */
    private $Ordr;

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

    public function setPrice(?float $Price): self
    {
        $this->Price = $Price;

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
            $ordr->setDoprava($this);
        }

        return $this;
    }

    public function removeOrdr(Ordr $ordr): self
    {
        if ($this->Ordr->contains($ordr)) {
            $this->Ordr->removeElement($ordr);
            // set the owning side to null (unless already changed)
            if ($ordr->getDoprava() === $this) {
                $ordr->setDoprava(null);
            }
        }

        return $this;
    }
}
