<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DevoirRepository")
 */
class Devoir
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
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Formateur")
     * @ORM\JoinColumn(name="formateur_id", referencedColumnName="id")
     */
    private $formateurs;

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

    public function getFormateurs(): ?Formateur
    {
        return $this->formateurs;
    }

    public function setFormateurs(Formateur $formateurs): self
    {
        $this->formateurs = $formateurs;

        return $this;
    }
}
