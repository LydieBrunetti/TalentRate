<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuil_mini;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuil_intermediaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuil_maxi;

    /**
     *@ORM\ManyToMany(targetEntity="App\Entity\Formateur", mappedBy="competences")
     */
    private $formateurs;

    /**
     *@ORM\ManyToMany(targetEntity="App\Entity\Parcours", mappedBy="competences")
     */
    private $parcours;

    public function __construct()
    {
        $this->formateurs = new ArrayCollection();
        $this->parcours = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSeuilMini(): ?int
    {
        return $this->seuil_mini;
    }

    public function setSeuilMini(int $seuil_mini): self
    {
        $this->seuil_mini = $seuil_mini;

        return $this;
    }

    public function getSeuilIntermediaire(): ?int
    {
        return $this->seuil_intermediaire;
    }

    public function setSeuilIntermediaire(int $seuil_intermediaire): self
    {
        $this->seuil_intermediaire = $seuil_intermediaire;

        return $this;
    }

    public function getSeuilMaxi(): ?int
    {
        return $this->seuil_maxi;
    }

    public function setSeuilMaxi(int $seuil_maxi): self
    {
        $this->seuil_maxi = $seuil_maxi;

        return $this;
    }

    public function getFormateurs()
    {
        return $this->formateurs;
    }

    public function setFormateurs(ArrayCollection $formateurs): self
    {
        $this->formateurs = $formateurs;

        return $this;
    }

    public function getParcours()
    {
        return $this->parcours;
    }

    public function setParcours(ArrayCollection $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }

}
