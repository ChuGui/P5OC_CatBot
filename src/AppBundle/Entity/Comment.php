<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Groups;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"comment_observation"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     * @Groups({"comment_observation"})
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     * @Groups({"comment_observation"})
     */
    private $updateAt;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"comment_observation"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Observation", inversedBy="comments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity="Actualite", inversedBy="comments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $actualite;


    public function __construct()
    {
        $this->updateAt = new \Datetime();
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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
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
     * @return Comment
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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @return mixed
     */
    public function setObservation(Observation $observation)
    {
        $this->observation = $observation;
    }
    /**
     * @return mixed
     */
    public function getActualite()
    {
        return $this->actualite;
    }

    /**
     * @return mixed
     */
    public function setActualite(Actualite $actualite)
    {
        $this->actualite = $actualite;
    }

}
