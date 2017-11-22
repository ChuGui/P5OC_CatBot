<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Actualite
 *
 * @ORM\Table(name="actualite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActualiteRepository")
 */
class Actualite
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     */
    private $updateAt;

    /**
     * @var string
     *
     * @ORM\Column(name="actualite_image", nullable=true, type="string", length=255)
     */
    private $actualiteImage;

    /**
     * One Actualite has One User.
     * @ORM\Column(type="integer", length=32, unique=false, nullable=true)
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    public function __construct()
    {
        $this->author = 1;
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
     * Set title
     *
     * @param string $title
     *
     * @return Actualite
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Actualite
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Actualite
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set actualiteImage
     *
     * @param string $actualiteImage
     *
     * @return Actualite
     */
    public function setActualiteImage($actualiteImage)
    {
        $this->actualiteImage = $actualiteImage;

        return $this;
    }

    /**
     * Get actualiteImage
     *
     * @return string
     */
    public function getActualiteImage()
    {
        return $this->actualiteImage;
    }


    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Actualite
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
