<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $name;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cours", mappedBy="promotion")
     */
    private $cours;

    /**
     *@ORM\ManyToMany(targetEntity="App\Entity\Etudiant", mappedBy="promotions")
     */
    private $etudiants;

    /**
     * @ORM\ManyToOne(targetEntity="Parcours")
     * @ORM\JoinColumn(name="parcours_id", referencedColumnName="id")
     */
    private $parcours;


    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCours()
    {
        return $this->cours;
    }

    public function setCours(ArrayCollection $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    public function getEtudiants()
    {
        return $this->etudiants;
    }

    public function setEtudiants(ArrayCollection $etudiants): self
    {
        $this->etudiants = $etudiants;

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(Parcours $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }
}
