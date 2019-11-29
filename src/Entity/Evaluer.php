<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvaluerRepository")
 */
class Evaluer
{
     /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Devoir")
     */
    private $devoir;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Etudiant")
     */
    private $etudiant;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Competence")
     */
    private $competence;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    public function __construct(Devoir $devoir, Competence $competence, Etudiant $etudiant)
    {
        $this->devoir = $devoir;
        $this->competence = $competence;
        $this->etudiant = $etudiant;
    }

    public function getDevoir(): ?Devoir
    {
        return $this->devoir;
    }

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }


    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }
}
