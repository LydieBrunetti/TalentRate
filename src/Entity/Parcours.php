<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParcoursRepository")
 */
class Parcours
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
    private $nom;

    /**
    * @ORM\ManyToMany(targetEntity="App\Entity\Competence", inversedBy="parcours")
    * @ORM\JoinTable(name="offrir")
     */
    private $competences;

    /**
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="parcours")
     */
    private $promotions;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->promotions = new ArrayCollection();
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

    public function getCompetences()
    {
        return $this->competences;
    }

    public function setCompetences(ArrayCollection $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getPromotions()
    {
        return $this->promotions;
    }

    public function setPromotions(ArrayCollection $promotions): self
    {
        $this->promotions = $promotions;

        return $this;
    }
}
