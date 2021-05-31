<?php

namespace App\Entity;

use App\Repository\TypeRevenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRevenusRepository::class)
 */
class TypeRevenus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $nom;

    /**
     * @ORM\OneToMany(targetEntity=Revenu::class, mappedBy="typeRevenu", orphanRemoval=true,cascade={"persist"})
     */
    private Collection|null $Revenu;

    public function __construct()
    {
        $this->Revenu = new ArrayCollection();
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

    /**
     * @return Collection|Montant[]
     */
    public function getRevenu(): ?Collection
    {
        return $this->Revenu;
    }

    public function addRevenu(?Revenu $revenu): self
    {
        if (!$this->Revenu->contains($revenu)) {
            $this->Revenu[] = $revenu;
            $revenu->setTypeRevenu($this);
        }

        return $this;
    }

    public function removeRevenu(?Revenu $revenu): self
    {
        if ($this->Member->removeElement($revenu)) {
            // set the owning side to null (unless already changed)
            if ($revenu->getTypeRevenu() === $this) {
                $revenu->setTypeRevenu(null);
            }
        }

        return $this;
    }
}
