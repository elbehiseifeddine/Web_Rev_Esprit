<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $REF;

    /**
     * @ORM\Column(type="date")
     */
    private $Creation_date;


    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->Creation_date;
    }

    public function setCreationDate(\DateTimeInterface $Creation_date): self
    {
        $this->Creation_date = $Creation_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getREF()
    {
        return $this->REF;
    }
}
