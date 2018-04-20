<?php

namespace Eni\DemoBundle\Model;

class Client
{
    private $nom;

    private $dateDeNaissance;

    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    
        return $this;
    }

    public function getDateDeNaissance()
    {
        return $this->dateDeNaissance;
    }
}