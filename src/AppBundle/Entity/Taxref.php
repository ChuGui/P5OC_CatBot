<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxref
 *
 * @ORM\Table(name="taxref")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxrefRepository")
 */
class Taxref
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
     * @var string
     *
     * @ORM\Column(name="nom_scientifique", type="string", length=255)
     */
    private $nomScientifique;

    /**
     * @var string
     *
     * @ORM\Column(name="cd_nom", type="string", length=255)
     */
    private $cdNom;

    /**
     * @var string
     *
     * @ORM\Column(name="ordre", type="string", length=255)
     */
    private $ordre;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="first_observation", type="string")
     */
    private $firstObservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_observation", type="string")
     */
    private $lastObservation;

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
     * Set nomScientifique
     *
     * @param string $nomScientifique
     *
     * @return Taxref
     */
    public function setNomScientifique($nomScientifique)
    {
        $this->nomScientifique = $nomScientifique;

        return $this;
    }

    /**
     * Get nomScientifique
     *
     * @return string
     */
    public function getNomScientifique()
    {
        return $this->nomScientifique;
    }

    /**
     * Set cdNom
     *
     * @param string $cdNom
     *
     * @return Taxref
     */
    public function setCdNom($cdNom)
    {
        $this->cdNom = $cdNom;

        return $this;
    }

    /**
     * Get cdNom
     *
     * @return string
     */
    public function getCdNom()
    {
        return $this->cdNom;
    }

    /**
     * Set ordre
     *
     * @param string $ordre
     *
     * @return Taxref
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return string
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Taxref
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set firstObservation
     *
     * @param string $firstObservation
     *
     * @return Taxref
     */
    public function setFirstObservation($firstObservation)
    {
        $this->firstObservation = $firstObservation;

        return $this;
    }

    /**
     * Get firstObservation
     *
     * @return string
     */
    public function getFirstObservation()
    {
        return $this->firstObservation;
    }

    /**
     * Set lastObservation
     *
     * @param \DateTime $lastObservation
     *
     * @return Taxref
     */
    public function setLastObservation($lastObservation)
    {
        $this->lastObservation = $lastObservation;

        return $this;
    }

    /**
     * Get lastObservation
     *
     * @return \DateTime
     */
    public function getLastObservation()
    {
        return $this->lastObservation;
    }
}

