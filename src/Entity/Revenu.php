<?php

namespace App\Entity;

use App\Repository\MontantRepository;
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
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $dateReception;

    /**
     * @ORM\ManyToOne(targetEntity=TypeRevenus::class, inversedBy="Member", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeRevenu;


    /**
     * @ORM\ManyToOne(targetEntity=Members::class, inversedBy="Revenu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateReception(): ?\DateTimeInterface
    {
        return $this->dateReception;
    }

    public function setDateReception(\DateTimeInterface $dateReception): self
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
