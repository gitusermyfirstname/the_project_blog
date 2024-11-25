<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $economique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $new = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEconomique(): ?string
    {
        return $this->economique;
    }

    public function setEconomique(string $economique): static
    {
        $this->economique = $economique;

        return $this;
    }

    public function getNew(): ?string
    {
        return $this->new;
    }

    public function setNew(?string $new): static
    {
        $this->new = $new;

        return $this;
    }
}
