<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 */
class Employee
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
     * @ORM\Column(type="string", length=255)
     */
    private $Post;

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

    public function getPost(): ?string
    {
        return $this->Post;
    }

    public function setPost(string $Post): self
    {
        $this->Post = $Post;

        return $this;
    }
}
