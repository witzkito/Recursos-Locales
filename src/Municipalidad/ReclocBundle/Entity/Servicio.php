<?php

namespace Municipalidad\ReclocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;


/**
 * Servicio
 *
 * @ORM\Table(name="servicio")
 * @ORM\Entity(repositoryClass="Municipalidad\ReclocBundle\Entity\Repositorio\ServicioRepository")
 */
class Servicio
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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Rubro", mappedBy="servicio")
     */
    private $rubros;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Servicio
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
     * @return Servicio
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
     * @param DateTime $fechaActualizado
     * @return Servicio
     */
    public function setFechaActualizado($fechaActualizado)
    {
        $this->fechaActualizado = $fechaActualizado;
    
        return $this;
    }

    /**
     * Get fechaActualizado
     *
     * @return DateTime
     */
    public function getFechaActualizado()
    {
        return $this->fechaActualizado;
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
     * Get Rubros
     *
     * @return Collection 
     */    
    public function getRubros() {
        return $this->rubros;
    }

    /**
     * Set Rubros
     *
     * @param collection $rubros
     * @return Collection
     */
    public function setRubros($rubros) {
       return $this->rubros = $rubros;
    }
    
    public function __construct(){
        $this->fechaCreado = new DateTime('NOW');
        $this->fechaActualizado = new DateTime('NOW');
    }


    /**
     * Add rubros
     *
     * @param \Municipalidad\ReclocBundle\Entity\Rubro $rubros
     * @return Servicio
     */
    public function addRubro(\Municipalidad\ReclocBundle\Entity\Rubro $rubros)
    {
        $this->rubros[] = $rubros;
    
        return $this;
    }

    /**
     * Remove rubros
     *
     * @param \Municipalidad\ReclocBundle\Entity\Rubro $rubros
     */
    public function removeRubro(\Municipalidad\ReclocBundle\Entity\Rubro $rubros)
    {
        $this->rubros->removeElement($rubros);
    }
    
    public function __toString() {
        return $this->nombre;
    }
}