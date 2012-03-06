<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agoratec\VueloAppBundle\Entity\Usuario
 */
class Usuario
{
    /**
     * @var integer $uid
     */
    private $uid;

    /**
     * @var string $login
     */
    private $login;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $status
     */
    private $status;

    /**
     * @var string $role
     */
    private $role;

    /**
     * @var string $salt
     */
    private $salt;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $activationKey
     */
    private $activationKey;

    /**
     * @var datetime $createdAt
     */
    private $createdAt;

    /**
     * @var text $bios
     */
    private $bios;

    /**
     * @var Agoratec\VueloAppBundle\Entity\Post
     */
    private $aviones;

    public function __construct()
    {
        $this->aviones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set login
     *
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set activationKey
     *
     * @param string $activationKey
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;
    }

    /**
     * Get activationKey
     *
     * @return string 
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set bios
     *
     * @param text $bios
     */
    public function setBios($bios)
    {
        $this->bios = $bios;
    }

    /**
     * Get bios
     *
     * @return text 
     */
    public function getBios()
    {
        return $this->bios;
    }

    /**
     * Add aviones
     *
     * @param Agoratec\VueloAppBundle\Entity\Post $aviones
     */
    public function addPost(\Agoratec\VueloAppBundle\Entity\Post $aviones)
    {
        $this->aviones[] = $aviones;
    }

    /**
     * Get aviones
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAviones()
    {
        return $this->aviones;
    }
    /**
     * @ORM\prePersist
     */
    public function setCreatedValue()
    {
        // Add your code here
    }
}