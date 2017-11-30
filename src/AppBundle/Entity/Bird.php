<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bird
 *
 * @ORM\Table(name="bird")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BirdRepository")
 */
class Bird
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="cdName", type="string", length=255)
     */
    private $cdName;

    /**
     * @ORM\Column(type="string")
     */
    private $lbName;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * @ORM\ManyToOne(targetEntity="Habitat")
     */
    private $habitat;


    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="bird" )
     */
    private $observations;

    public function __construct()
    {
        $this->observations = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Bird
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cdName
     *
     * @param string $cdName
     *
     * @return Bird
     */
    public function setCdName($cdName)
    {
        $this->cdName = $cdName;

        return $this;
    }

    /**
     * Get cdName
     *
     * @return string
     */
    public function getCdName()
    {
        return $this->cdName;
    }

    /**
     * @return mixed
     */
    public function getLbName()
    {
        return $this->lbName;
    }

    /**
     * @param mixed $lbName
     */
    public function setLbName($lbName)
    {
        $this->lbName = $lbName;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Bird
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * @param mixed $habitat
     */
    public function setHabitat(Habitat $habitat)
    {
        $this->habitat = $habitat;
    }

    /**
     * @return ArrayCollection|Observation[]
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * @param mixed $observations
     */
    public function setObservations(Observation $observations)
    {
        $this->observations = $observations;
    }


}

