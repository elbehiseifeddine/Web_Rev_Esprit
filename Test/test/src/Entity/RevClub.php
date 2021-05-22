<?php

namespace App\Entity;

use App\Repository\RevClubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RevClubRepository::class)
 */
class RevClub
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CreationDate;

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function getCreationDate(): ?string
    {
        return $this->CreationDate;
    }

    public function setCreationDate(string $CreationDate): self
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }
}
