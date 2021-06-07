<?php

namespace App\Entity;

use App\Repository\PackageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackageRepository::class)
 */
class Package
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $City;

    /**
     * @ORM\Column(type="integer")
     */
    private $Weight;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="package", orphanRemoval=true)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="parcels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity=Extradition::class, inversedBy="package", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $extradition;


    public function __construct()
    {
        $this->location = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

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

    public function getWeight(): ?int
    {
        return $this->Weight;
    }

    public function setWeight(int $Weight): self
    {
        $this->Weight = $Weight;

        return $this;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocation(): Collection
    {
        return $this->location;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->location->contains($location)) {
            $this->location[] = $location;
            $location->setPackage($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->location->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getPackage() === $this) {
                $location->setPackage(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getExtradition(): ?Extradition
    {
        return $this->extradition;
    }

    public function setExtradition(Extradition $extradition): self
    {
        $this->extradition = $extradition;

        return $this;
    }
}
