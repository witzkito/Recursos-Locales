<?php

namespace Municipalidad\ReclocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Rubro
 *
 * @ORM\Table(name="rubro")
 * @ORM\Entity(repositoryClass="Municipalidad\ReclocBundle\Entity\Repositorio\RubroRepository")
 */
class Rubro
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creado", type="datetime", nullable=true)
     */
    private $fechaCreado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_actualizado", type="datetime", nullable=true)
     */
    private $fechaActualizado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @var \Servicio
    *
    * @ORM\ManyToOne(targetEntity="Servicio", inversedBy="servicio")
    * @ORM\JoinColumn(name="servicio", referencedColumnName="id")
    */
    private $servicio;
    
    /**
     * @ORM\OneToMany(targetEntity="Institucion", mappedBy="rubro")
     */
    private $instituciones;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Rubro
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
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
     * Set fechaCreado
     *
     * @param \DateTime $fechaCreado
     * @return Rubro
     */
    public function setFechaCreado($fechaCreado)
    {
        $this->fechaCreado = $fechaCreado;
    
        return $this;
    }

    /**
     * Get fechaCreado
     *
     * @return \DateTime 
     */
    public function getFechaCreado()
    {
        return $this->fechaCreado;
    }

    /**
     * Set fechaActualizado
     *
     * @param string $fechaActualizado
     * @return Rubro
     */
    public function setFechaActualizado($fechaActualizado)
    {
        $this->fechaActualizado = $fechaActualizado;
    
        return $this;
    }

    /**
     * Get fechaActualizado
     *
     * @return string 
     */
    public function getFechaActualizado()
    {
        return $this->fechaActualizado;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Rubro
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * Set servicio
     *
     * @param \Municipalidad\ReclocBundle\Entity\Servicio $servicio
     * @return Rubro
     */
    public function setServicio(\Municipalidad\ReclocBundle\Entity\Servicio $servicio = null)
    {
        $this->servicio = $servicio;
    
        return $this;
    }

    /**
     * Get servicio
     *
     * @return \Municipalidad\ReclocBundle\Entity\Servicio 
     */
    public function getServicio()
    {
        return $this->servicio;
    }
    
    /**
     * Get Instituciones
     *
     * @return Collection 
     */   
    public function getInstituciones() {
        return $this->instituciones;
    }

    /**
     * Set Instituciones
     *
     * @param collection $instituciones
     * @return Collection
     */
    public function setInstituciones($instituciones) {
        return $this->instituciones = $instituciones;
    }


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->instituciones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fechaCreado = new DateTime('NOW');
        $this->fechaActualizado = new DateTime('NOW');
    }
    
    /**
     * Add instituciones
     *
     * @param \Municipalidad\ReclocBundle\Entity\Institucion $instituciones
     * @return Rubro
     */
    public function addInstitucione(\Municipalidad\ReclocBundle\Entity\Institucion $instituciones)
    {
        $this->instituciones[] = $instituciones;
    
        return $this;
    }

    /**
     * Remove instituciones
     *
     * @param \Municipalidad\ReclocBundle\Entity\Institucion $instituciones
     */
    public function removeInstitucione(\Municipalidad\ReclocBundle\Entity\Institucion $instituciones)
    {
        $this->instituciones->removeElement($instituciones);
    }
    
    public function __toString() {
        return $this->nombre;
    }
    
    
}