<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\saisonRepository")
 */
class saison
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;





    /**
     * @var \DateTime
     *
     *
     * @ORM\Column(name="deb_saison", type="date" )
     */
    private $debSaison;

    /**
     * @return mixed
     */
    public function getEspece()
    {
        return $this->espece;
    }


    /**
     * @param mixed $espece
     */
    public function setEspece($espece)
    {
        $this->espece = $espece;
    }

    /**
     * @ORM\ManyToOne(targetEntity="espece")
     * @ORM\JoinColumn(name="id_espece", referencedColumnName="id")
     */
    private $espece;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin_saison", type="date")
     */
    private $finSaison;

    /**
     * @var string
     *
     * @ORM\Column(name="region_chasse", type="string", length=255)
     */
    private $regionChasse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_saison", type="string", length=255)
     */
    private $nomSaison;

    public function __toString()
    {
        return $this->nomSaison;
    }

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
     * @return \DateTime
     */
    public function getFinSaison()
    {
        return $this->finSaison;
    }

    /**
     * @param \DateTime $finSaison
     */
    public function setFinSaison($finSaison)
    {
        $this->finSaison = $finSaison;
    }



    /**
     * @return \DateTime
     */
    public function getDebSaison()
    {
        return $this->debSaison;
    }

    /**
     * @param \DateTime $debSaison
     */
    public function setDebSaison($debSaison)
    {
        $this->debSaison = $debSaison;
    }



    /**
     * Set regionChasse
     *
     * @param string $regionChasse
     *
     * @return saison
     */
    public function setRegionChasse($regionChasse)
    {
        $this->regionChasse = $regionChasse;

        return $this;
    }

    /**
     * Get regionChasse
     *
     * @return string
     */
    public function getRegionChasse()
    {
        return $this->regionChasse;
    }

    /**
     * Set nomSaison
     *
     * @param string $nomSaison
     *
     * @return saison
     */
    public function setNomSaison($nomSaison)
    {
        $this->nomSaison = $nomSaison;

        return $this;
    }

    /**
     * Get nomSaison
     *
     * @return string
     */
    public function getNomSaison()
    {
        return $this->nomSaison;
    }
}

