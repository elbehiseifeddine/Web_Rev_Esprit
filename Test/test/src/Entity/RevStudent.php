<?php

namespace App\Entity;

use App\Repository\RevStudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RevStudentRepository::class)
 */
class RevStudent
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
    private $nsc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=RevClassrom::class, inversedBy="revStudents")
     */
    private $classroom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNsc(): ?string
    {
        return $this->nsc;
    }

    public function setNsc(string $nsc): self
    {
        $this->nsc = $nsc;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getClassroom(): ?RevClassrom
    {
        return $this->classroom;
    }

    public function setClassroom(?RevClassrom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }
}
