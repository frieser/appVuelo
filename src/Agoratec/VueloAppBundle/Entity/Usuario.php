<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity
 * @ORM\Table(name="app.usuarios")
 */
class Usuario implements UserInterface
{
    /**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue
	*/
	protected $uid;
	
	/**
     * @ORM\Column(type="string", length=100)
	 * @Assert\NotBlank()
	 * 
     */
	protected $nombre;

	/**
     * @ORM\Column(type="string", length=100)
	 * @Assert\NotBlank()
     */
	protected $login;
	
	/**
     * @ORM\Column(type="string", length=100)
	 * @Assert\MinLength(6)
     */
	protected $password;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
	protected $salt;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

	  /**
     * @ORM\Column(type="date")
     */
    private $fecha_nac;

    /**
     * @ORM\Column(type="text")
     */
    private $bios;

    /**
     * @ORM\OneToMany(targetEntity="Avion", mappedBy="propietario")
     */
    private $aviones;

    public function __construct()
    {
        $this->aviones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    function equals(\Symfony\Component\Security\Core\User\UserInterface $usuario)
	{
		return $this->getEmail() == $usuario->getEmail();
	}
	
	function eraseCredentials()
	{
		
	}
	function getRoles()
	{
		return array('ROLE_USUARIO');
	}
	function getUsername()
	{
		return $this->getEmail();
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
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
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
     * @param Agoratec\VueloAppBundle\Entity\Avion $aviones
     */
    public function addAvion(\Agoratec\VueloAppBundle\Entity\Avion $aviones)
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
     * Set fecha_nac
     *
     * @param date $fechaNac
     */
    public function setFechaNac($fechaNac)
    {
        $this->fecha_nac = $fechaNac;
    }

    /**
     * Get fecha_nac
     *
     * @return date 
     */
    public function getFechaNac()
    {
        return $this->fecha_nac;
    }
}