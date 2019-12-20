<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoolRepository")
 */
class Cool
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $super;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuper(): ?string
    {
        return $this->super;
    }

    public function setSuper(string $super): self
    {
        $this->super = $super;

        return $this;
    }
}
