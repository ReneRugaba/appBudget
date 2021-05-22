<?php

namespace App\Entity;

use App\Repository\SoldesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SoldesRepository::class)
 */
class Soldes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $RevenuTotal;

    /**
     * @ORM\Column(type="float")
     */
    private $depenseTotal;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Members::class, inversedBy="soldes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRevenuTotal(): ?float
    {
        return $this->RevenuTotal;
    }

    public function setRevenuTotal(float $RevenuTotal): self
    {
        $this->RevenuTotal = $RevenuTotal;

        return $this;
    }

    public function getDepenseTotal(): ?float
    {
        return $this->depenseTotal;
    }

    public function setDepenseTotal(float $depenseTotal): self
    {
        $this->depenseTotal = $depenseTotal;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getMember(): ?Members
    {
        return $this->member;
    }

    public function setMember(?Members $member): self
    {
        $this->member = $member;

        return $this;
    }
}
