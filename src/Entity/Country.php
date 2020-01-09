<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
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
     * @ORM\OneToMany(targetEntity="App\Entity\Ordr", mappedBy="country")
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
            $ordr->setCountry($this);
        }

        return $this;
    }

    public function removeOrdr(Ordr $ordr): self
    {
        if ($this->Ordr->contains($ordr)) {
            $this->Ordr->removeElement($ordr);
            // set the owning side to null (unless already changed)
            if ($ordr->getCountry() === $this) {
                $ordr->setCountry(null);
            }
        }

        return $this;
    }
}
