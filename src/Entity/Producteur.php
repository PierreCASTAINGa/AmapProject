<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProducteurRepository")
 */
class Producteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonSociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomResponsable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomResponsable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseProducteur;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $cpProducteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeProducteur;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telFixeProducteur;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telPortProducteur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Categorie", mappedBy="producteur")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getNomResponsable(): ?string
    {
        return $this->nomResponsable;
    }

    public function setNomResponsable(string $nomResponsable): self
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    public function getPrenomResponsable(): ?string
    {
        return $this->prenomResponsable;
    }

    public function setPrenomResponsable(string $prenomResponsable): self
    {
        $this->prenomResponsable = $prenomResponsable;

        return $this;
    }

    public function getAdresseProducteur(): ?string
    {
        return $this->adresseProducteur;
    }

    public function setAdresseProducteur(?string $adresseProducteur): self
    {
        $this->adresseProducteur = $adresseProducteur;

        return $this;
    }

    public function getCpProducteur(): ?string
    {
        return $this->cpProducteur;
    }

    public function setCpProducteur(?string $cpProducteur): self
    {
        $this->cpProducteur = $cpProducteur;

        return $this;
    }

    public function getVilleProducteur(): ?string
    {
        return $this->villeProducteur;
    }

    public function setVilleProducteur(?string $villeProducteur): self
    {
        $this->villeProducteur = $villeProducteur;

        return $this;
    }

    public function getTelFixeProducteur(): ?string
    {
        return $this->telFixeProducteur;
    }

    public function setTelFixeProducteur(?string $telFixeProducteur): self
    {
        $this->telFixeProducteur = $telFixeProducteur;

        return $this;
    }

    public function getTelPortProducteur(): ?string
    {
        return $this->telPortProducteur;
    }

    public function setTelPortProducteur(?string $telPortProducteur): self
    {
        $this->telPortProducteur = $telPortProducteur;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(?bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setProducteur($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getProducteur() === $this) {
                $category->setProducteur(null);
            }
        }

        return $this;
    }

}
