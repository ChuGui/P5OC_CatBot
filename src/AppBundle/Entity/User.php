<?php

namespace AppBundle\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="On dirait que vous avez déjà un compte! :)")
 * @UniqueEntity(fields={"username"}, message="Ce pseudo a déjà été choisi" )
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Groups({"group1"})
     * @Groups({"comment_observation"})
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=3, minMessage="Votre pseudo doit comporter au moins 3 lettres")
     * @ORM\Column(type="string", unique=true)
     * @Groups({"group1"})
     * @Groups({"comment_observation"})
     */
    private $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string", unique=true)
     * @Groups({"group1"})
     */
    private $email;


    /**
     * The encoded password
     *
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * A non-persisted field that's used to create the encoded password.
     * @Assert\NotBlank(groups={"Registration"})
     *
     * @var string
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string")
     * @Groups({"group1"})
     * @Groups({"comment_observation"})
     */
    private $profilePicture;

    /**
     * The encoded token
     *
     * @ORM\Column(type="string")
     */
    private $token;

    /**
     * The level of the user
     *
     * @ORM\Column(type="string")
     */
    private $level;


    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user", cascade={"remove"})
     * @ORM\OrderBy({"updateAt" = "DESC"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="user", cascade={"remove"})
     * @ORM\OrderBy({"updateAt" = "DESC"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $observations;

    /**
     * @ORM\OneToMany(targetEntity="Actualite", mappedBy="user")
     * @ORM\OrderBy({"updateAt" = "DESC"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $actualites;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newsletter;

    /**
     * @ORM\ManyToMany(targetEntity="Observation", mappedBy="usersVoted")
     * @ORM\JoinTable(name="observations_voted")
     */
    private $observationsVotedFor;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    public function __construct()
    {
        $this->isActive = true;
        $this->token = hash('sha512', uniqid());
        $this->roles = ['ROLE_USER'];
        $this->profilePicture = 'anonyme.png';
        $this->level= 'moineau';
        $this->nbObservations=0;
        $this->comments = new ArrayCollection();
        $this->actualites = new ArrayCollection();
        $this->observations = new ArrayCollection();
        $this->observationsVotedFor = new ArrayCollection();
    }
    // needed by the security system

    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->roles;


        return $roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        // leaving blank - I don't need/have a password!
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        // forces the object to look "dirty" to Doctrine. Avoids
        // Doctrine *not* saving this entity, if only plainPassword changes
        $this->password = null;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }



    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->isActive
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->isActive
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }


    /**
     * Set profilePicture
     *
     * @param string $profilePicture
     *
     * @return User
     */
    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    /**
     * Get profilePicture
     *
     * @return string
     */
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    /**
     * Set level
     *
     * @param string $level
     *
     * @return User
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Get level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $comments
     */
    public function setComments(Comment $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return ArrayCollection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $observations
     */
    public function setObservations(Observation $observations)
    {
        $this->observations = $observations;
    }

    /**
     * @return ArrayCollection|Observation[]
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * @return ArrayCollection|Actualite[]
     */
    public function getActualite()
    {
        return $this->actualites;
    }
    /**
     * @param mixed $actualites
     */
    public function setActualites(Observation $actualites)
    {
        $this->actualites = $actualites;
    }

    /**
     * @return ArrayCollection|Observation[]
     */
    public function getObservationsVotedFor()
    {
        return $this->observationVotedFor;
    }




}
