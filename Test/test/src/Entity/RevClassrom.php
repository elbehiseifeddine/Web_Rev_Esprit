<?php

namespace App\Entity;

use App\Repository\RevClassromRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RevClassromRepository::class)
 */
class RevClassrom
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=RevStudent::class, mappedBy="classroom")
     */
    private $revStudents;

    public function __construct()
    {
        $this->revStudents = new ArrayCollection();
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
     * @return Collection|RevStudent[]
     */
    public function getRevStudents(): Collection
    {
        return $this->revStudents;
    }

    public function addRevStudent(RevStudent $revStudent): self
    {
        if (!$this->revStudents->contains($revStudent)) {
            $this->revStudents[] = $revStudent;
            $revStudent->setClassroom($this);
        }

        return $this;
    }

    public function removeRevStudent(RevStudent $revStudent): self
    {
        if ($this->revStudents->contains($revStudent)) {
            $this->revStudents->removeElement($revStudent);
            // set the owning side to null (unless already changed)
            if ($revStudent->getClassroom() === $this) {
                $revStudent->setClassroom(null);
            }
        }

        return $this;
    }
}
