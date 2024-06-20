<?php

namespace App\Entity;

use App\Repository\PersonListRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonListRepository::class)]
class PersonList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $line = null;

    #[ORM\Column(nullable: true)]
    private ?int $count = null;

    #[ORM\Column(nullable: true)]
    private ?int $score = null;

    #[ORM\Column(nullable: true)]
    private ?bool $screen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLine(): ?string
    {
        return $this->line;
    }

    public function setLine(string $line): static
    {
        $this->line = $line;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): static
    {
        $this->count = $count;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function isScreen(): ?bool
    {
        return $this->screen;
    }

    public function setScreen(?bool $screen): static
    {
        $this->screen = $screen;

        return $this;
    }
}
