<?php

namespace App\Entity;

use App\Repository\DepensesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepensesRepository::class)
 */
class Depenses
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
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $datePaiement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $beneficiaire;

    /**
     * @ORM\ManyToOne(targetEntity=Members::class, inversedBy="Depenses", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity=CathegoriesDepenses::class, inversedBy="depenses", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $CathegorieDepense;

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

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(?\DateTimeInterface $datePaiement): self
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    public function getBeneficiaire(): ?string
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?string $beneficiaire): self
    {
        $this->beneficiaire = $beneficiaire;

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

    public function getCathegorieDepense(): ?CathegoriesDepenses
    {
        return $this->CathegorieDepense;
    }

    public function setCathegorieDepense(?CathegoriesDepenses $CathegorieDepense): self
    {
        $this->CathegorieDepense = $CathegorieDepense;

        return $this;
    }
}
