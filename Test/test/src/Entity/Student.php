<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=25)
     */
    private $NSC;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Email;

    /**
     * @ORM\ManyToOne(targetEntity=Classroom::class, inversedBy="students")
     */
    private $classroom;



    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNSC()
    {
        return $this->NSC;
    }

    /**
     * @param mixed $NSC
     */
    public function setNSC($NSC): void
    {
        $this->NSC = $NSC;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }


}
