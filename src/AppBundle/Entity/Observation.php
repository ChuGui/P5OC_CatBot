<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use JMS\Serializer\Annotation\Groups;


/**
 * Observation
 *
 * @ORM\Table(name="observation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObservationRepository")
 * @Vich\Uploadable
 */
class Observation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"show_coordinates"})
     * @Groups({"lastObservation"})
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     * @Groups({"show_coordinates"})
     * @Groups({"coordinates"})
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     * @Groups({"show_coordinates"})
     * @Groups({"coordinates"})
     */
    private $longitude;

    /**
     * @var bool
     *
     * @ORM\Column(name="isValidated", type="boolean")
     */
    private $isValidated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime")
     * @Groups({"show_coordinates"})
     */
    private $updateAt;

    /**
     * @ORM\Column(name="observedAt", type="datetime")
     */
    private $observedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @Assert\Valid()
     * @Assert\Type(type="AppBundle\Entity\Bird")
     * @Assert\NotNull(message="Il faut choisir un nom d'espèce")
     * @ORM\ManyToOne(targetEntity="Bird", inversedBy="observations", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_coordinates"})
     */
    private $bird;

    /**
     * @ORM\Column(type="integer")
     */
    private $qtyBirds;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="observation", cascade={"remove"})
     * @ORM\OrderBy({"updateAt" = "DESC"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="observations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="observationsVotedFor")
     * @ORM\JoinTable(name="users_voted")
     */
    private $usersVoted;

    public function __construct()
    {
        $this->IsValidated = false;
        $this->updateAt = new \DateTime();
        $this->vote = 0;
        $this->usersVoted = new ArrayCollection();
        $this->comments = new ArrayCollection();
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Observation
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Observation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set isValidated
     *
     * @param boolean $isValidated
     *
     * @return Observation
     */
    public function setIsValidated($isValidated)
    {
        $this->isValidated = $isValidated;

        return $this;
    }

    /**
     * Get isValidated
     *
     * @return bool
     */
    public function getIsValidated()
    {
        return $this->isValidated;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Observation
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
     * @return ArrayCollection|Bird[]
     */
    public function getBird()
    {
        return $this->bird;
    }

    /**
     * @param mixed $bird
     */
    public function setBird(Bird $bird)
    {
        $this->bird = $bird;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $userVoted
     */
    public function addUsersVoted(User $user)
    {
        $this->usersVoted[] = $user;
    }


    public function removeUsersVoted(User $user)
    {
        $this->usersVoted->removeElement($user);
    }

    /**
     * @return ArrayCollection|User[]
     */
    public function getUsersVoted()
    {
        return $this->usersVoted;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    /**
     * @return mixed
     */
    public function getObservedAt()
    {
        return $this->observedAt;
    }

    /**
     * @param mixed $observedAt
     */
    public function setObservedAt($observedAt)
    {
        $this->observedAt = $observedAt;
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
    public function getQtyBirds()
    {
        return $this->qtyBirds;
    }

    /**
     * @param mixed $qtyBirds
     */
    public function setQtyBirds($qtyBirds)
    {
        $this->qtyBirds = $qtyBirds;
    }

    /**
     * @return ArrayCollection|Comment[]
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * @param mixed $comment
     */
    public function setComment(Comment $comment)
    {
        $this->comment = $comment;
    }

}

