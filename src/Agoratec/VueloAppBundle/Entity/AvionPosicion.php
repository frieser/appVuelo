<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="app.avion_posicion")
 */
class AvionPosicion
{
	/**
	 * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Avion", inversedBy="posiciones")
     * @ORM\JoinColumn(name="avion", referencedColumnName="avid")
     */
    protected $avion;
	
	/**
     * @ORM\Column(type="int")
     */
    protected $orientacion;
	
	/**
     * @ORM\Column(type="int")
     */
    protected $velocidad;
	
	/**
     * @ORM\Column(type="int")
     */
    protected $altitud;
	
	/**
     * @ORM\Column(type="Point")
     */
    protected $posicion;
    

    /**
	 * @ORM\Id
     * @ORM\Column(type="datetime")
     */
    protected $hora;
	
	
	/**
     * @ORM\prePersist
     */
    public function setCreatedValue()
    {
        $this->hora = new \DateTime();
    }
	
		

    /**
     * Set orientacion
     *
     * @param int $orientacion
     */
    public function setOrientacion(\int $orientacion)
    {
        $this->orientacion = $orientacion;
    }

    /**
     * Get orientacion
     *
     * @return int 
     */
    public function getOrientacion()
    {
        return $this->orientacion;
    }

    /**
     * Set velocidad
     *
     * @param int $velocidad
     */
    public function setVelocidad(\int $velocidad)
    {
        $this->velocidad = $velocidad;
    }

    /**
     * Get velocidad
     *
     * @return int 
     */
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    /**
     * Set altitud
     *
     * @param int $altitud
     */
    public function setAltitud(\int $altitud)
    {
        $this->altitud = $altitud;
    }

    /**
     * Get altitud
     *
     * @return int 
     */
    public function getAltitud()
    {
        return $this->altitud;
    }

    /**
     * Set posicion
     *
     * @param Point $posicion
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    }

    /**
     * Get posicion
     *
     * @return Point 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set hora
     *
     * @param datetime $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    /**
     * Get hora
     *
     * @return datetime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set avion
     *
     * @param Agoratec\VueloAppBundle\Entity\Aviones $avion
     */
    public function setAvion(\Agoratec\VueloAppBundle\Entity\Aviones $avion)
    {
        $this->avion = $avion;
    }

    /**
     * Get avion
     *
     * @return Agoratec\VueloAppBundle\Entity\Aviones 
     */
    public function getAvion()
    {
        return $this->avion;
    }
}