<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommande;

      /**
     * @ORM\Column(type="integer")
     */
    private $idProduit;

     /**
     * @ORM\Column(type="integer")
     */
    private $idUser;

    /**
     * @ORM\ManyToMany(targetEntity=LigneProduit::class, mappedBy="commande")
     */
    private $ligneProduits;

    /**
     * @ORM\OneToOne(targetEntity=Facture::class, cascade={"persist", "remove"})
     */
    private $facture;

    public function __construct()
    {
        $this->ligneProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * @return Collection|LigneProduit[]
     */
    public function getLigneProduits(): Collection
    {
        return $this->ligneProduits;
    }

    public function addLigneProduit(LigneProduit $ligneProduit): self
    {
        if (!$this->ligneProduits->contains($ligneProduit)) {
            $this->ligneProduits[] = $ligneProduit;
            $ligneProduit->addCommande($this);
        }

        return $this;
    }

    public function removeLigneProduit(LigneProduit $ligneProduit): self
    {
        if ($this->ligneProduits->removeElement($ligneProduit)) {
            $ligneProduit->removeCommande($this);
        }

        return $this;
    }

    public function getFacture(): ?facture
    {
        return $this->facture;
    }

    public function setFacture(?facture $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function setIdProduit(?int $idproduit): self
    {
         $this->idProduit=$idproduit;
         return $this ;
    }

    public function setIdUser(?int $idUser): self
    {
         $this->idUser=$idUser;
         return $this ;
    }

}
