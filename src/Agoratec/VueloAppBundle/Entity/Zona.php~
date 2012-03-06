<?php

namespace Agoratec\VueloAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app.zonas")
 */
class Zona
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $zid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $nombre;
	
	/**
     * @ORM\Column(type="string",length=1)
     */
    protected $tipo;
	
	/**
     * @ORM\Column(type="Polygon")
     */
    protected $area;

    /**
     * Get zid
     *
     * @return integer 
     */
    public function getZid()
    {
        return $this->zid;
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
     * Set area
     *
     * @param Polygon $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return Polygon 
     */
    public function getArea()
    {
        return $this->area;
    }
}