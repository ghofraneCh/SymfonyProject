<?php

namespace App\Entity;

use App\Repository\TypeProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeProduitRepository::class)
 */
class TypeProduit
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
    private $saison;

    /**
     * @ORM\Column(type="integer")
     */
    private $Sexe;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="TypeProduit")
     */
    private $taille;

    public function __construct()
    {
        $this->taille = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getSexe(): ?int
    {
        return $this->Sexe;
    }

    public function setSexe(int $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getTaille(): Collection
    {
        return $this->taille;
    }

    public function addTaille(Produit $taille): self
    {
        if (!$this->taille->contains($taille)) {
            $this->taille[] = $taille;
            $taille->setTypeProduit($this);
        }

        return $this;
    }

    public function removeTaille(Produit $taille): self
    {
        if ($this->taille->removeElement($taille)) {
            // set the owning side to null (unless already changed)
            if ($taille->getTypeProduit() === $this) {
                $taille->setTypeProduit(null);
            }
        }

        return $this;
    }
}
