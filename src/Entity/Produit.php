<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $unite;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiteMin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbCheque;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreDeDistribution;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDeLivraisonsRestantes;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $periodeDebut;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $periodeFin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $periodicite;

    /**
     * @ORM\Column(type="integer")
     */
    private $categorieid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="produits")
     */
    private $categorie;


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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(?string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getQuantiteMin(): ?int
    {
        return $this->quantiteMin;
    }

    public function setQuantiteMin(int $quantiteMin): self
    {
        $this->quantiteMin = $quantiteMin;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

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

    public function getNombreDeDistribution(): ?int
    {
        return $this->nombreDeDistribution;
    }

    public function setNombreDeDistribution(?int $nombreDeDistribution): self
    {
        $this->nombreDeDistribution = $nombreDeDistribution;

        return $this;
    }

    public function getNombreDeLivraisonsRestantes(): ?int
    {
        return $this->nombreDeLivraisonsRestantes;
    }

    public function setNombreDeLivraisonsRestantes(int $nombreDeLivraisonsRestantes): self
    {
        $this->nombreDeLivraisonsRestantes = $nombreDeLivraisonsRestantes;

        return $this;
    }

    public function getPeriodeDebut(): ?string
    {
        return $this->periodeDebut;
    }

    public function setPeriodeDebut(?string $periodeDebut): self
    {
        $this->periodeDebut = $periodeDebut;

        return $this;
    }

    public function getPeriodeFin(): ?string
    {
        return $this->periodeFin;
    }

    public function setPeriodeFin(?string $periodeFin): self
    {
        $this->periodeFin = $periodeFin;

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

    public function getPeriodicite(): ?string
    {
        return $this->periodicite;
    }

    public function setPeriodicite(?string $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    public function getCategorieid(): ?int
    {
        return $this->categorieid;
    }

    public function setCategorieid(int $categorieid): self
    {
        $this->categorieid = $categorieid;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

}
