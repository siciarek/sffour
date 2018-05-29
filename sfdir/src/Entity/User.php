<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint")
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", options={"default":true})
     * @var string
     */
    private $enabled = true;

    /**
     * @ORM\Column()
     * @var string
     */
    private $firstName;

    /**
     * @ORM\Column()
     * @var string
     */
    private $lastName;

    /**
     * @ORM\Column()
     * @var string
     */
    private $email;

    /**
     * @ORM\Column()
     * @var string
     */
    private $password;

    /**
     * @ORM\Column()
     * @var string
     */
    private $salt;

    /**
     * @ORM\Column(nullable=true)
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="text", length=10000, nullable=true)
     * @var string
     */
    protected $info;

    /**
     * @ORM\ManyToMany(targetEntity="Group")
     */
    private $group;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set enabled.
     *
     * @param string $enabled
     *
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return string
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt.
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return User
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set info.
     *
     * @param string|null $info
     *
     * @return User
     */
    public function setInfo($info = null)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info.
     *
     * @return string|null
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Add group.
     *
     * @param \App\Entity\Group $group
     *
     * @return User
     */
    public function addGroup(\App\Entity\Group $group)
    {
        $this->group[] = $group;

        return $this;
    }

    /**
     * Remove group.
     *
     * @param \App\Entity\Group $group
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGroup(\App\Entity\Group $group)
    {
        return $this->group->removeElement($group);
    }

    /**
     * Get group.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroup()
    {
        return $this->group;
    }
}

