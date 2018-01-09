<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Bird
 *
 * @ORM\Table(name="bird")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BirdRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Le nom de l'espèce est obligatoire")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="bird" )
     */
    private $observations;

    /**
     * @ORM\OneToOne(targetEntity="Taxref")
     * @ORM\JoinColumn(nullable=true)
     */
    private $taxref;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $plumage;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $pattes;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $couleurBec;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $formeBec;

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
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTaxref()
    {
        return $this->taxref;
    }

    /**
     * @param mixed $taxref
     */
    public function setTaxref(Taxref $taxref)
    {
        $this->taxref = $taxref;
    }

    /**
     * @return mixed
     */
    public function getPlumage()
    {
        return $this->plumage;
    }

    /**
     * @param mixed $plumage
     */
    public function setPlumage($plumage)
    {
        $this->plumage = $plumage;
    }

    /**
     * @return mixed
     */
    public function getPattes()
    {
        return $this->pattes;
    }

    /**
     * @param mixed $pattes
     */
    public function setPattes($pattes)
    {
        $this->pattes = $pattes;
    }

    /**
     * @return mixed
     */
    public function getCouleurBec()
    {
        return $this->couleurBec;
    }

    /**
     * @param mixed $couleurBec
     */
    public function setCouleurBec($couleurBec)
    {
        $this->couleurBec = $couleurBec;
    }

    /**
     * @return mixed
     */
    public function getFormeBec()
    {
        return $this->formeBec;
    }

    /**
     * @param mixed $formeBec
     */
    public function setFormeBec($formeBec)
    {
        $this->formeBec = $formeBec;
    }

}

