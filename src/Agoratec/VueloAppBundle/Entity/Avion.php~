<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agoratec\VueloAppBundle\Entity\Avion
 */
class Avion
{
    /**
     * @var integer $avid
     */
    private $avid;

    /**
     * @var string $marca
     */
    private $marca;

    /**
     * @var string $modelo
     */
    private $modelo;

    /**
     * @var Agoratec\VueloAppBundle\Entity\Usuario
     */
    private $propietario;

    /**
     * @var Agoratec\VueloAppBundle\Entity\AvionPosicion
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