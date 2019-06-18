<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbCheque;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nbChequeFixe;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarque;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlImg;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionProduits;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SuperCategorie", inversedBy="categories")
     * @ORM\JoinColumn(nullable=true)
     */

    private $SuperCategorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produit", mappedBy="categorie")
     */
    private $produits;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Producteur", inversedBy="categories")
     */
    private $producteur;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getNbCheque(): ?int
    {
        return $this->nbCheque;
    }

    public function setNbCheque(int $nbCheque): self
    {
        $this->nbCheque = $nbCheque;

        return $this;
    }

    public function getNbChequeFixe(): ?bool
    {
        return $this->nbChequeFixe;
    }

    public function setNbChequeFixe(bool $nbChequeFixe): self
    {
        $this->nbChequeFixe = $nbChequeFixe;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): self
    {
        $this->remarque = $remarque;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getUrlImg(): ?string
    {
        return $this->urlImg;
    }

    public function setUrlImg(?string $urlImg): self
    {
        $this->urlImg = $urlImg;

        return $this;
    }

    public function getDescriptionProduits(): ?string
    {
        return $this->descriptionProduits;
    }

    public function setDescriptionProduits(?string $descriptionProduits): self
    {
        $this->descriptionProduits = $descriptionProduits;

        return $this;
    }

    public function getSuperCategorie(): ?SuperCategorie
    {
        return $this->SuperCategorie;
    }

    public function setSuperCategorie(?SuperCategorie $SuperCategorie): self
    {
        $this->SuperCategorie = $SuperCategorie;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->contains($produit)) {
            $this->produits->removeElement($produit);
            // set the owning side to null (unless already changed)
            if ($produit->getCategorie() === $this) {
                $produit->setCategorie(null);
            }
        }

        return $this;
    }

    public function getProducteur(): ?Producteur
    {
        return $this->producteur;
    }

    public function setProducteur(?Producteur $producteur): self
    {
        $this->producteur = $producteur;

        return $this;
    }
}
