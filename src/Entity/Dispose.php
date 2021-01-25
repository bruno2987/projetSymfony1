<?php

namespace App\Entity;

use App\Repository\DisposeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DisposeRepository::class)
 */
class Dispose
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=animal::class, inversedBy="disposes")
     */
    private $animal;

    /**
     * @ORM\ManyToOne(targetEntity=personne::class, inversedBy="disposes")
     */
    private $personne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimal(): ?animal
    {
        return $this->animal;
    }

    public function setAnimal(?animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getPersonne(): ?personne
    {
        return $this->personne;
    }

    public function setPersonne(?personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(?int $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}
