<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $Size;

    /**
     * @ORM\Column(type="integer")
     */
    private $Weight;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $endurance;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=Package::class, mappedBy="category", orphanRemoval=true)
     */
    private $parcels;

    public function __construct()
    {
        $this->parcels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->Size;
    }

    public function setSize(string $Size): self
    {
        $this->Size = $Size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->Weight;
    }

    public function setWeight(int $Weight): self
    {
        $this->Weight = $Weight;

        return $this;
    }

    public function getEndurance(): ?string
    {
        return $this->endurance;
    }

    public function setEndurance(string $endurance): self
    {
        $this->endurance = $endurance;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Package[]
     */
    public function getParcels(): Collection
    {
        return $this->parcels;
    }

    public function addParcel(Package $parcel): self
    {
        if (!$this->parcels->contains($parcel)) {
            $this->parcels[] = $parcel;
            $parcel->setCategory($this);
        }

        return $this;
    }

    public function removeParcel(Package $parcel): self
    {
        if ($this->parcels->removeElement($parcel)) {
            // set the owning side to null (unless already changed)
            if ($parcel->getCategory() === $this) {
                $parcel->setCategory(null);
            }
        }

        return $this;
    }
}
