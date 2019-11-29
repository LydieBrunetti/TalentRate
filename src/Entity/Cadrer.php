<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CadrerRepository")
 */
class Cadrer
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Devoir")
     */
    private $devoir;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Competence")
     */
    private $competence;

    /**
     * @ORM\Column(type="integer")
     */
    private $max;

    public function __construct(Devoir $devoir, Competence $competence)
    {
        $this->devoir = $devoir;
        $this->competence = $competence;
    }

    public function getDevoir(): ?Devoir
    {
        return $this->devoir;
    }

    public function getCompetence(): ?Competence
    {
        return $this->competence;
    }

    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }
}
