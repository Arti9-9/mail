<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arrival;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity=Package::class, inversedBy="location")
     * @ORM\JoinColumn(nullable=false)
     */
    private $package;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="locations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrival(): ?\DateTimeInterface
    {
        return $this->arrival;
    }

    public function setArrival(\DateTimeInterface $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getDeparture(): ?\DateTimeInterface
    {
        return $this->departure;
    }

    public function setDeparture(?\DateTimeInterface $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getPackage(): ?Package
    {
        return $this->package;
    }

    public function setPackage(?Package $package): self
    {
        $this->package = $package;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
