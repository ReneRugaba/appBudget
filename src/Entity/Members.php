<?php

namespace App\Entity;

use App\Repository\MembersRepository;
use App\Security\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembersRepository::class)
 */
class Members extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
     * @ORM\OneToMany(targetEntity=Revenu::class, mappedBy="Member", orphanRemoval=true, cascade={"persist"})
     */
    private $Revenu;

    /**
     * @ORM\OneToMany(targetEntity=Depenses::class, mappedBy="member", orphanRemoval=true, cascade={"persist"})
     */
    private $Depenses;

    /**
     * @ORM\OneToMany(targetEntity=Soldes::class, mappedBy="member", orphanRemoval=true, cascade={"persist"})
     */
    private $soldes;

    public function __construct()
    {
        $this->Revenu = new ArrayCollection();
        $this->Depenses = new ArrayCollection();
        $this->soldes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection|Revenu[]
     */
    public function getRevenu(): Collection
    {
        return $this->Revenu;
    }

    public function addRevenu(Revenu $revenu): self
    {
        if (!$this->Revenu->contains($revenu)) {
            $this->Revenu[] = $revenu;
            $revenu->setMember($this);
        }

        return $this;
    }

    public function removeRevenu(Revenu $revenu): self
    {
        if ($this->Revenu->removeElement($revenu)) {
            // set the owning side to null (unless already changed)
            if ($revenu->getMember() === $this) {
                $revenu->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Depenses[]
     */
    public function getDepenses(): Collection
    {
        return $this->Depenses;
    }

    public function addDepense(Depenses $depense): self
    {
        if (!$this->Depenses->contains($depense)) {
            $this->Depenses[] = $depense;
            $depense->setMember($this);
        }

        return $this;
    }

    public function removeDepense(Depenses $depense): self
    {
        if ($this->Depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getMember() === $this) {
                $depense->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Soldes[]
     */
    public function getSoldes(): Collection
    {
        return $this->soldes;
    }

    public function addSolde(Soldes $solde): self
    {
        if (!$this->soldes->contains($solde)) {
            $this->soldes[] = $solde;
            $solde->setMember($this);
        }

        return $this;
    }

    public function removeSolde(Soldes $solde): self
    {
        if ($this->soldes->removeElement($solde)) {
            // set the owning side to null (unless already changed)
            if ($solde->getMember() === $this) {
                $solde->setMember(null);
            }
        }

        return $this;
    }
}
