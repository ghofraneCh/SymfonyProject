<?php

namespace App\Entity;

use App\Repository\LigneProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneProduitRepository::class)
 */
class LigneProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, inversedBy="produit")
     */
    private $produit;

    /**
     * @ORM\ManyToMany(targetEntity=commande::class, inversedBy="ligneProduits")
     */
    private $commande;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
        $this->commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        $this->produit->removeElement($produit);

        return $this;
    }

    /**
     * @return Collection|commande[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
        }

        return $this;
    }

    public function removeCommande(commande $commande): self
    {
        $this->commande->removeElement($commande);

        return $this;
    }
}
