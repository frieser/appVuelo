<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app.aviones")
 */
class Avion
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $avid;

	/**
     * @ORM\Column(type="string", length=100)
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="aviones")
     * @ORM\JoinColumn(name="avion", referencedColumnName="avid")
     */
    private $propietario;

    /**
     * @ORM\OneToMany(targetEntity="AvionPosicion", mappedBy="avion")
     */
    private $posiciones;

    public function __construct()
    {
        $this->posiciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    

    /**
     * Get avid
     *
     * @return integer 
     */
    public function getAvid()
    {
        return $this->avid;
    }

    /**
     * Set marca
     *
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set propietario
     *
     * @param Agoratec\VueloAppBundle\Entity\Usuario $propietario
     */
    public function setPropietario(\Agoratec\VueloAppBundle\Entity\Usuario $propietario)
    {
        $this->propietario = $propietario;
    }

    /**
     * Get propietario
     *
     * @return Agoratec\VueloAppBundle\Entity\Usuario 
     */
    public function getPropietario()
    {
        return $this->propietario;
    }

    /**
     * Add posiciones
     *
     * @param Agoratec\VueloAppBundle\Entity\AvionPosicion $posiciones
     */
    public function addAvionPosicion(\Agoratec\VueloAppBundle\Entity\AvionPosicion $posiciones)
    {
        $this->posiciones[] = $posiciones;
    }

    /**
     * Get posiciones
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosiciones()
    {
        return $this->posiciones;
    }
}