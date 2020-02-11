<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * espece
 *
 * @ORM\Table(name="espece")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\especeRepository")
 */
class espece
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function __toString()
    {
        return $this->nomEspece;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="nom_espece", type="string", length=255)
     */
    private $nomEspece;

    /**
     * @var string
     *
     * @ORM\Column(name="sous_espece", type="string", length=255)
     */
    private $sousEspece;

    /**
     * @var string
     *
     * @ORM\Column(name="description_espece", type="string", length=255)
     */
    private $descriptionEspece;


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
     * Set nomEspece
     *
     * @param string $nomEspece
     *
     * @return espece
     */
    public function setNomEspece($nomEspece)
    {
        $this->nomEspece = $nomEspece;

        return $this;
    }

    /**
     * Get nomEspece
     *
     * @return string
     */
    public function getNomEspece()
    {
        return $this->nomEspece;
    }

    /**
     * Set sousEspece
     *
     * @param string $sousEspece
     *
     * @return espece
     */
    public function setSousEspece($sousEspece)
    {
        $this->sousEspece = $sousEspece;

        return $this;
    }

    /**
     * Get sousEspece
     *
     * @return string
     */
    public function getSousEspece()
    {
        return $this->sousEspece;
    }

    /**
     * Set descriptionEspece
     *
     * @param string $descriptionEspece
     *
     * @return espece
     */
    public function setDescriptionEspece($descriptionEspece)
    {
        $this->descriptionEspece = $descriptionEspece;

        return $this;
    }

    /**
     * Get descriptionEspece
     *
     * @return string
     */
    public function getDescriptionEspece()
    {
        return $this->descriptionEspece;
    }
}

