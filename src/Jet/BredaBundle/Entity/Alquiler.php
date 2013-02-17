<?php

namespace Jet\BredaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jet\BredaBundle\Entity\Alquiler
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Alquiler
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text $descipcion
     *
     * @ORM\Column(name="titulo", type="text")
     */
    private $titulo;

    /**
     * @var text $descipcion
     *
     * @ORM\Column(name="descipcion", type="text")
     */
    private $descipcion;

    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string $poblacion
     *
     * @ORM\Column(name="poblacion", type="string", length=255)
     */
    private $poblacion;

    /**
     * @var string $postal
     *
     * @ORM\Column(name="postal", type="string", length=10)
     */
    private $postal;

    /**
     * @var text $extra
     *
     * @ORM\Column(name="extra", type="text",nullable="true")
     */
    private $extra;

    /**
     * @var text $superficie
     *
     * @ORM\Column(name="superficie", type="integer")
     */
    private $superficie;

    /**
     * @var text $tipo
     *
     * nave
     * despacho
     * piso
     * @ORM\Column(name="tipo", type="text")
     */
    private $tipo;


    /**
     * @var text $destacado
     *
     * @ORM\Column(name="destacado", type="boolean")
     */
    private $destacado = false;


    //RELATIONS

    /**
     * @ORM\OneToMany(targetEntity="Foto", mappedBy="alquiler")
     */
    private $fotos;


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
     * Set descipcion
     *
     * @param text $descipcion
     */
    public function setDescipcion($descipcion)
    {
        $this->descipcion = $descipcion;
    }

    /**
     * Get descipcion
     *
     * @return text
     */
    public function getDescipcion()
    {
        return $this->descipcion;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
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
     * Set poblacion
     *
     * @param string $poblacion
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;
    }

    /**
     * Get poblacion
     *
     * @return string
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set postal
     *
     * @param string $postal
     */
    public function setPostal($postal)
    {
        $this->postal = $postal;
    }

    /**
     * Get postal
     *
     * @return string
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * Set extra
     *
     * @param text $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    /**
     * Get extra
     *
     * @return text
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Set tipo
     *
     * @param text $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * Get tipo
     *
     * @return text
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    public function __construct()
    {
        $this->fotos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fotos
     *
     * @param Jet\BredaBundle\Entity\Foto $fotos
     */
    public function addFoto(\Jet\BredaBundle\Entity\Foto $fotos)
    {
        $this->fotos[] = $fotos;
    }

    /**
     * Get fotos
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getFotos()
    {
        return $this->fotos;
    }

    /**
     * Set titulo
     *
     * @param text $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Get titulo
     *
     * @return text
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function numFotos()
    {
        return count($this->fotos);
    }

    /**
     * Set superficie
     *
     * @param integer $superficie
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;
    }

    /**
     * Get superficie
     *
     * @return integer
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    public function getShortDescripcion($len=300){
        return substr(nl2br(strip_tags($this->descipcion)),0,$len);
       // return $this->descipcion;
    }

    /**
     * Set destacado
     *
     * @param boolean $destacado
     */
    public function setDestacado($destacado)
    {
        $this->destacado = $destacado;
    }

    /**
     * Get destacado
     *
     * @return boolean 
     */
    public function getDestacado()
    {
        return $this->destacado;
    }
}