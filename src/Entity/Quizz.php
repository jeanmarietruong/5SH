<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuizzRepository")
 */
class Quizz
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="quizzs")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fullname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $placeofbirth;

    /**
     * @ORM\Column(type="boolean")
     */
    private $race;

    /**
     * @ORM\Column(type="boolean")
     */
    private $alias;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publisher;

    /**
     * @ORM\Column(type="boolean")
     */
    private $occupation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $groupaffiliation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $relative;

    /**
     * @ORM\Column(type="boolean")
     */
    private $base;

    /**
     * @ORM\Column(type="boolean")
     */
    private $firstappearance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hero;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFullname(): ?bool
    {
        return $this->fullname;
    }

    public function setFullname(bool $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getPlaceofbirth(): ?bool
    {
        return $this->placeofbirth;
    }

    public function setPlaceofbirth(bool $placeofbirth): self
    {
        $this->placeofbirth = $placeofbirth;

        return $this;
    }

    public function getRace(): ?bool
    {
        return $this->race;
    }

    public function setRace(bool $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getAlias(): ?bool
    {
        return $this->alias;
    }

    public function setAlias(bool $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getPublisher(): ?bool
    {
        return $this->publisher;
    }

    public function setPublisher(bool $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getOccupation(): ?bool
    {
        return $this->occupation;
    }

    public function setOccupation(bool $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getGroupaffiliation(): ?bool
    {
        return $this->groupaffiliation;
    }

    public function setGroupaffiliation(bool $groupaffiliation): self
    {
        $this->groupaffiliation = $groupaffiliation;

        return $this;
    }

    public function getRelative(): ?bool
    {
        return $this->relative;
    }

    public function setRelative(bool $relative): self
    {
        $this->relative = $relative;

        return $this;
    }

    public function getBase(): ?bool
    {
        return $this->base;
    }

    public function setBase(bool $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getFirstappearance(): ?bool
    {
        return $this->firstappearance;
    }

    public function setFirstappearance(bool $firstappearance): self
    {
        $this->firstappearance = $firstappearance;

        return $this;
    }

    public function getHero(): ?string
    {
        return $this->hero;
    }

    public function setHero(string $hero): self
    {
        $this->hero = $hero;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }
}
