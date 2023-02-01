<?php

namespace App\Entity;

use App\Repository\PaintingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaintingRepository::class)]
class Painting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $painting_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paintingURL = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paintingDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $painterName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $painterDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $smallPaintingUrl = null;

    #[ORM\ManyToOne]
    private ?artMovment $movmentKey = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaintingName(): ?string
    {
        return $this->painting_name;
    }

    public function setPaintingName(?string $painting_name): self
    {
        $this->painting_name = $painting_name;

        return $this;
    }

    public function getPaintingURL(): ?string
    {
        return $this->paintingURL;
    }

    public function setPaintingURL(?string $paintingURL): self
    {
        $this->paintingURL = $paintingURL;

        return $this;
    }

    public function getPaintingDate(): ?string
    {
        return $this->paintingDate;
    }

    public function setPaintingDate(?string $paintingDate): self
    {
        $this->paintingDate = $paintingDate;

        return $this;
    }

    public function getPainterName(): ?string
    {
        return $this->painterName;
    }

    public function setPainterName(?string $painterName): self
    {
        $this->painterName = $painterName;

        return $this;
    }

    public function getPainterDescription(): ?string
    {
        return $this->painterDescription;
    }

    public function setPainterDescription(?string $painterDescription): self
    {
        $this->painterDescription = $painterDescription;

        return $this;
    }

    public function getSmallPaintingUrl(): ?string
    {
        return $this->smallPaintingUrl;
    }

    public function setSmallPaintingUrl(?string $smallPaintingUrl): self
    {
        $this->smallPaintingUrl = $smallPaintingUrl;

        return $this;
    }

    public function getMovmentKey(): ?artMovment
    {
        return $this->movmentKey;
    }

    public function setMovmentKey(?artMovment $movmentKey): self
    {
        $this->movmentKey = $movmentKey;

        return $this;
    }
}
