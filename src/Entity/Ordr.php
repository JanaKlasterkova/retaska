<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdrRepository")
 */
class Ordr
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
     * @ORM\Column(type="text")
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Phone;

    /**
     * @ORM\Column(type="text")
     */
    private $Street;

    /**
     * @ORM\Column(type="text")
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PSC;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="Ordr")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="Ordr")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Doprava", inversedBy="Ordr")
     */
    private $doprava;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Platba", inversedBy="Ordr")
     */
    private $platba;

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

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->Street;
    }

    public function setStreet(string $Street): self
    {
        $this->Street = $Street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getPSC(): ?string
    {
        return $this->PSC;
    }

    public function setPSC(string $PSC): self
    {
        $this->PSC = $PSC;

        return $this;
    }


    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getDoprava(): ?Doprava
    {
        return $this->doprava;
    }

    public function setDoprava(?Doprava $doprava): self
    {
        $this->doprava = $doprava;

        return $this;
    }

    public function getPlatba(): ?Platba
    {
        return $this->platba;
    }

    public function setPlatba(?Platba $platba): self
    {
        $this->platba = $platba;

        return $this;
    }
}
