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
    protected $name;
	
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
    public function setArea(\Polygon $area)
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