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
     * @ORM\Column(name="extra", type="text")
     */
    private $extra;


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
}