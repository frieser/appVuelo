<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app.aeropuertos")
 */
class Aeropuerto
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $aid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nombre;
	
	/**
     * @ORM\Column(type="string",length=1)
     */
    protected $tipo;
	
	/**
     * @ORM\Column(type="Point")
     */
    protected $posicion;



    /**
     * Get aid
     *
     * @return integer 
     */
    public function getAid()
    {
        return $this->aid;
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
     * Set tipo
     *
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
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
}