<?php

namespace App\Entity;

use App\Repository\ExtraditionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExtraditionRepository::class)
 */
class Extradition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $department;

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
    private $passport;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $extradition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartment(): ?int
    {
        return $this->department;
    }

    public function setDepartment(int $department): self
    {
        $this->department = $department;

        return $this;
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
        return $this->passport;
    }

    public function setPassport(string $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getExtradition(): ?\DateTimeInterface
    {
        return $this->extradition;
    }

    public function setExtradition(?\DateTimeInterface $extradition): self
    {
        $this->extradition = $extradition;

        return $this;
    }
}
