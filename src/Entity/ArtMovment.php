<?php

namespace App\Entity;

use App\Repository\ArtMovmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtMovmentRepository::class)]
class ArtMovment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $artMovmentName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $artMovmentDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $artMovmentDescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtMovmentName(): ?string
    {
        return $this->artMovmentName;
    }

    public function setArtMovmentName(?string $artMovmentName): self
    {
        $this->artMovmentName = $artMovmentName;

        return $this;
    }

    public function getArtMovmentDate(): ?string
    {
        return $this->artMovmentDate;
    }

    public function setArtMovmentDate(?string $artMovmentDate): self
    {
        $this->artMovmentDate = $artMovmentDate;

        return $this;
    }

    public function getArtMovmentDescription(): ?string
    {
        return $this->artMovmentDescription;
    }

    public function setArtMovmentDescription(?string $artMovmentDescription): self
    {
        $this->artMovmentDescription = $artMovmentDescription;

        return $this;
    }
}
