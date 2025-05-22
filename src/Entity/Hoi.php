<?php

namespace App\Entity;

use App\Repository\HoiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoiRepository::class)]
class Hoi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fasjipiof = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFasjipiof(): ?string
    {
        return $this->fasjipiof;
    }

    public function setFasjipiof(string $fasjipiof): static
    {
        $this->fasjipiof = $fasjipiof;

        return $this;
    }
}
