<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormateurRepository")
 */
class Formateur
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_naissance;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cours", mappedBy="formateur")
     */
    private $cours;

    /**
    * @ORM\ManyToMany(targetEntity="App\Entity\Competence", inversedBy="formateurs")
    * @ORM\JoinTable(name="enseigner")
     */
    private $competences;

     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Devoir", mappedBy="formateurs")
     */
    private $devoirs;


    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->competences = new ArrayCollection();
        $this->devoirs = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

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

    public function getCompetences()
    {
        return $this->competences;
    }

    public function setCompetences(ArrayCollection $competences): self
    {
        $this->competences = $competences;

        return $this;
    }

    public function getDevoirs()
    {
        return $this->devoirs;
    }

    public function setDevoirs(ArrayCollection $devoirs): self
    {
        $this->devoirs = $devoirs;

        return $this;
    }
}
