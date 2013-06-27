<?php

namespace Jet\BredaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jet\BredaBundle\Entity\Clientes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Clientes
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
    private $nombre;

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
     * Set nombre
     *
     * @param text $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return text 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}