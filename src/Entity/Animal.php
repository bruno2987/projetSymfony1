<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;     // Pour mettre des contraintes de validations des donnée quand on les rentre via des formulaires


/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=2,max=500)
     */

     //   explication @Assert\Range(min=2,max=500)  (issu de use Symfony\Component\Validator\Constraints as Assert;):
     //  La valeur pour être valide devra se trouver entre 2 et 500.
    private $poids;

    /**
     * @ORM\ManyToOne(targetEntity=Espece::class, inversedBy="animaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $espece;

    /**
     * @ORM\ManyToMany(targetEntity=Continent::class, mappedBy="animaux")
     */
    private $continents;

    /**
     * @ORM\OneToMany(targetEntity=Dispose::class, mappedBy="animal")
     */
    private $disposes;

    public function __construct()
    {
        $this->continents = new ArrayCollection();
        $this->disposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getEspece(): ?Espece
    {
        return $this->espece;
    }

    public function setEspece(?Espece $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    /**
     * @return Collection|Continent[]
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): self
    {
        if (!$this->continents->contains($continent)) {
            $this->continents[] = $continent;
            $continent->addAnimaux($this);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): self
    {
        if ($this->continents->removeElement($continent)) {
            $continent->removeAnimaux($this);
        }

        return $this;
    }

    /**
     * @return Collection|Dispose[]
     */
    public function getDisposes(): Collection
    {
        return $this->disposes;
    }

    public function addDispose(Dispose $dispose): self
    {
        if (!$this->disposes->contains($dispose)) {
            $this->disposes[] = $dispose;
            $dispose->setAnimal($this);
        }

        return $this;
    }

    public function removeDispose(Dispose $dispose): self
    {
        if ($this->disposes->removeElement($dispose)) {
            // set the owning side to null (unless already changed)
            if ($dispose->getAnimal() === $this) {
                $dispose->setAnimal(null);
            }
        }

        return $this;
    }
}