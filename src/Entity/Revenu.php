<?php

namespace App\Entity;

use App\Repository\MontantRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MontantRepository::class)
 */
class Revenu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="float")
     */
    private ?float $montant;

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $dateReception;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRevenus::class, inversedBy="Member", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private ?TypeRevenus $typeRevenu;


    /**
     * @ORM\ManyToOne(targetEntity=Members::class, inversedBy="Revenu")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Members $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateReception(): ?\DateTimeInterface
    {
        return $this->dateReception;
    }

    public function setDateReception(?\DateTimeInterface $dateReception): self
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    public function getTypeRevenu(): ?TypeRevenus
    {
        return $this->typeRevenu;
    }

    public function setTypeRevenu(?TypeRevenus $typeRevenu): self
    {
        $this->typeRevenu = $typeRevenu;

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
