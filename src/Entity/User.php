<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields = {"email"},
 * message = "Votre email existe déjà"
 * )
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telFixe;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telPort1;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telPort2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\EqualTo(propertyPath="confirm_email", message="votre email n'est pas identique")
     */
    private $email;

    /**
     * @Assert\EqualTo(propertyPath="email", message="votre email n'est pas identique")
     */
    public $confirm_email;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Le mot de passe = superieur ou égal à 8 caractères")
     * @Assert\EqualTo(propertyPath="confirm_password", message="votre mot de passe n'est pas identique")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="votre mot de passe n'est pas identique")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $charteAcceptee;


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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(?string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelFixe(): ?string
    {
        return $this->telFixe;
    }

    public function setTelFixe(?string $telFixe): self
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    public function getTelPort1(): ?string
    {
        return $this->telPort1;
    }

    public function setTelPort1(?string $telPort1): self
    {
        $this->telPort1 = $telPort1;

        return $this;
    }

    public function getTelPort2(): ?string
    {
        return $this->telPort2;
    }

    public function setTelPort2(?string $telPort2): self
    {
        $this->telPort2 = $telPort2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCharteAcceptee(): ?bool
    {
        return $this->charteAcceptee;
    }

    public function setCharteAcceptee(bool $charteAcceptee): self
    {
        $this->charteAcceptee = $charteAcceptee;

        return $this;
    }

    public function eraseCredentials() {}
    
    public function getUsername() {}
    
    public function getSalt() {
        return null;
    }


    public function getRoles() {

        // return ['ROLE_AMAPIEN'];
        // return [$this->$roles];
        return [$this->roles];
        // $roles[] = 'ROLE_ADMIN';  
    }

    public function serialize() {

        return  serialize([
                $this->id,
                $this->identifiant,
                $this->password
    ]);
    }


    public function unserialize($serialized) {

        list (
            $this->id,
            $this->identifiant,
            $this->password
        
        ) = unserialize($serialized, ['allowed_classes' => false]);

    }

}
