<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\promotionRepository")
 */
class promotion
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpromo", type="integer")
     * @ORM\Id

     */
    private $idpromo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime")
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="taux_red", type="integer")
     */
    private $tauxRed;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @ORM\ManyToOne(targetEntity="produit")
     * @ORM\JoinColumn(name="id_produit", referencedColumnName="idP")
     */
    private $produit;

    /**
     * @return int
     */
    public function getTauxRed()
    {
        return $this->tauxRed;
    }

    /**
     * @param int $tauxRed
     */
    public function setTauxRed($tauxRed)
    {
        $this->tauxRed = $tauxRed;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return promotion
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return promotion
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }
    public function __toString()
    {
        return $this->idpromo;
    }
    /**
     * @return int
     */
    public function getIdpromo()
    {
        return $this->idpromo;
    }

    /**
     * @param int $idpromo
     */
    public function setIdpromo($idpromo)
    {
        $this->idpromo = $idpromo;
    }




}

