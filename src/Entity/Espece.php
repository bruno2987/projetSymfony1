<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspeceRepository::class)
 */
class Espece
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=animal::class, mappedBy="espece")
     */
    private $animaux;

    public function __construct()
    {
        $this->animaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|animal[]
     */
    public function getAnimaux(): Collection
    {
        return $this->animaux;
    }

    public function addAnimaux(animal $animaux): self
    {
        if (!$this->animaux->contains($animaux)) {
            $this->animaux[] = $animaux;
            $animaux->setEspece($this);
        }

        return $this;
    }

    public function removeAnimaux(animal $animaux): self
    {
        if ($this->animaux->removeElement($animaux)) {
            // set the owning side to null (unless already changed)
            if ($animaux->getEspece() === $this) {
                $animaux->setEspece(null);
            }
        }

        return $this;
    }
}
