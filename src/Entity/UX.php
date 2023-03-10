<?php

namespace App\Entity;

use App\Repository\UXRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UXRepository::class)]
class UX
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
