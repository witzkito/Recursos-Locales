<?php

namespace Municipalidad\ReclocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Institucion
 *
 * @ORM\Table(name="institucion")
 * @ORM\Entity(repositoryClass="Municipalidad\ReclocBundle\Entity\Repositorio\InstitucionRepository")
 */
class Institucion
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="prestacion", type="text", nullable=true)
     */
    private $prestacion;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto_persona", type="string", length=100, nullable=true)
     */
    private $contactoPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=150, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonos", type="string", length=100, nullable=true)
     */
    private $telefonos;

    /**
     * @var string
     *
     * @ORM\Column(name="horario", type="string", length=200, nullable=true)
     */
    private $horario;

    /**
     * @var string
     *
     * @ORM\Column(name="requisitos", type="string", length=200, nullable=true)
     */
    private $requisitos;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
    * @var \Rubro
    *
    * @ORM\ManyToOne(targetEntity="Rubro", inversedBy="rubro")
    * @ORM\JoinColumn(name="rubro", referencedColumnName="id")
    */
    private $rubro;
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Institucion
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
     * Set prestacion
     *
     * @param string $prestacion
     * @return Institucion
     */
    public function setPrestacion($prestacion)
    {
        $this->prestacion = $prestacion;
    
        return $this;
    }

    /**
     * Get prestacion
     *
     * @return string 
     */
    public function getPrestacion()
    {
        return $this->prestacion;
    }

    /**
     * Set contactoPersona
     *
     * @param string $contactoPersona
     * @return Institucion
     */
    public function setContactoPersona($contactoPersona)
    {
        $this->contactoPersona = $contactoPersona;
    
        return $this;
    }

    /**
     * Get contactoPersona
     *
     * @return string 
     */
    public function getContactoPersona()
    {
        return $this->contactoPersona;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Institucion
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Institucion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefonos
     *
     * @param string $telefonos
     * @return Institucion
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;
    
        return $this;
    }

    /**
     * Get telefonos
     *
     * @return string 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * Set horario
     *
     * @param string $horario
     * @return Institucion
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    
        return $this;
    }

    /**
     * Get horario
     *
     * @return string 
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set requisitos
     *
     * @param string $requisitos
     * @return Institucion
     */
    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;
    
        return $this;
    }

    /**
     * Get requisitos
     *
     * @return string 
     */
    public function getRequisitos()
    {
        return $this->requisitos;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Institucion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Institucion
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
     * Set rubro
     *
     * @param \Municipalidad\ReclocBundle\Entity\Rubro $rubro
     * @return Institucion
     */
    public function setRubro(\Municipalidad\ReclocBundle\Entity\Rubro $rubro = null)
    {
        $this->rubro = $rubro;
    
        return $this;
    }

    /**
     * Get rubro
     *
     * @return \Municipalidad\ReclocBundle\Entity\Rubro 
     */
    public function getRubro()
    {
        return $this->rubro;
    }
    
    
    

    /**
     * Set fechaCreado
     *
     * @param \DateTime $fechaCreado
     * @return Institucion
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
     * @param \DateTime $fechaActualizado
     * @return Institucion
     */
    public function setFechaActualizado($fechaActualizado)
    {
        $this->fechaActualizado = $fechaActualizado;
    
        return $this;
    }

    /**
     * Get fechaActualizado
     *
     * @return \DateTime 
     */
    public function getFechaActualizado()
    {
        return $this->fechaActualizado;
    }
    
    public function __construct() {
        $this->fechaCreado = new DateTime('NOW');
        $this->fechaActualizado = new DateTime('NOW');
    }
}