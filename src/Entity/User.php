<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
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
    private $Surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Patronymic;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Passport;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Phone;

    /**
     * @ORM\OneToMany(targetEntity=Package::class, mappedBy="userId", orphanRemoval=true)
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

    public function getSurname(): ?string
    {
        return $this->Surname;
    }

    public function setSurname(string $Surname): self
    {
        $this->Surname = $Surname;

        return $this;
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

    public function getPatronymic(): ?string
    {
        return $this->Patronymic;
    }

    public function setPatronymic(?string $Patronymic): self
    {
        $this->Patronymic = $Patronymic;

        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->Passport;
    }

    public function setPassport(string $Passport): self
    {
        $this->Passport = $Passport;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(?string $Phone): self
    {
        $this->Phone = $Phone;

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
            $parcel->setUserId($this);
        }

        return $this;
    }

    public function removeParcel(Package $parcel): self
    {
        if ($this->parcels->removeElement($parcel)) {
            // set the owning side to null (unless already changed)
            if ($parcel->getUserId() === $this) {
                $parcel->setUserId(null);
            }
        }

        return $this;
    }
}
