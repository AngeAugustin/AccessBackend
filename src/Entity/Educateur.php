<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $Id = null;

    #[ORM\Column(length: 20)]
    private ?string $NPI = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Date_naissance = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Situation_matrimoniale = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Garant_1 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Adresse_garant1 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Garant_2 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Adresse_garant2 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Carte_identite = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Casier_judiciaire = null;

    #[ORM\Column(nullable: true)]
    private ?int $Experience = null;

    #[ORM\Column(length: 240, nullable: true)]
    private ?string $Parcours = null;

    #[ORM\Column(nullable: true)]
    private ?int $Etoiles = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Dispo1 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Dispo2 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Dispo3 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Dispo4 = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $Photo_educateur = null;

    public function getId(): ?int
    {
        return $this->Id;
    }

    public function getNPI(): ?string
    {
        return $this->NPI;
    }

    public function setNPI(string $NPI): static
    {
        $this->NPI = $NPI;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->Date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $Date_naissance): static
    {
        $this->Date_naissance = $Date_naissance;

        return $this;
    }

    public function getSituationMatrimoniale(): ?string
    {
        return $this->Situation_matrimoniale;
    }

    public function setSituationMatrimoniale(string $Situation_matrimoniale): static
    {
        $this->Situation_matrimoniale = $Situation_matrimoniale;

        return $this;
    }

    public function getGarant1(): ?string
    {
        return $this->Garant_1;
    }

    public function setGarant1(string $Garant_1): static
    {
        $this->Garant_1 = $Garant_1;

        return $this;
    }

    public function getAdresseGarant1(): ?string
    {
        return $this->Adresse_garant1;
    }

    public function setAdresseGarant1(string $Adresse_garant1): static
    {
        $this->Adresse_garant1 = $Adresse_garant1;

        return $this;
    }

    public function getGarant2(): ?string
    {
        return $this->Garant_2;
    }

    public function setGarant2(string $Garant_2): static
    {
        $this->Garant_2 = $Garant_2;

        return $this;
    }

    public function getAdresseGarant2(): ?string
    {
        return $this->Adresse_garant2;
    }

    public function setAdresseGarant2(string $Adresse_garant2): static
    {
        $this->Adresse_garant2 = $Adresse_garant2;

        return $this;
    }

    public function getCarteIdentite(): ?string
    {
        return $this->Carte_identite;
    }

    public function setCarteIdentite(string $Carte_identite): static
    {
        $this->Carte_identite = $Carte_identite;

        return $this;
    }

    public function getCasierJudiciaire(): ?string
    {
        return $this->Casier_judiciaire;
    }

    public function setCasierJudiciaire(string $Casier_judiciaire): static
    {
        $this->Casier_judiciaire = $Casier_judiciaire;

        return $this;
    }

    public function getExperience(): ?string
    {
        return $this->Experience;
    }

    public function setExperience(?string $Experience): static
    {
        $this->Experience = $Experience;

        return $this;
    }

    public function getParcours(): ?string
    {
        return $this->Parcours;
    }

    public function setParcours(?string $Parcours): static
    {
        $this->Parcours = $Parcours;

        return $this;
    }

    public function getEtoiles(): ?int
    {
        return $this->Etoiles;
    }

    public function setEtoiles(?int $Etoiles): static
    {
        $this->Etoiles = $Etoiles;

        return $this;
    }

    public function getDispo1(): ?string
    {
        return $this->Dispo1;
    }

    public function setDispo1(?string $Dispo1): static
    {
        $this->Dispo1 = $Dispo1;

        return $this;
    }

    public function getDispo2(): ?string
    {
        return $this->Dispo2;
    }

    public function setDispo2(?string $Dispo2): static
    {
        $this->Dispo2 = $Dispo2;

        return $this;
    }

    public function getDispo3(): ?string
    {
        return $this->Dispo3;
    }

    public function setDispo3(?string $Dispo3): static
    {
        $this->Dispo3 = $Dispo3;

        return $this;
    }

    public function getDispo4(): ?string
    {
        return $this->Dispo4;
    }

    public function setDispo4(?string $Dispo4): static
    {
        $this->Dispo4 = $Dispo4;

        return $this;
    }

    public function getPhotoEducateur(): ?string
    {
        return $this->Photo_educateur;
    }

    public function setPhotoEducateur(?string $Photo_educateur): static
    {
        $this->Photo_educateur = $Photo_educateur;

        return $this;
    }
}
