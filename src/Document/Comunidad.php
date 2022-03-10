<?php
// src/Document/Comunidad.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Comunidad
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $slug;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $nombre;

    /**
     * @MongoDB\Field(type="id")
     */
    protected $capital_id;

    public function getId()
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function getCapital_id(): ?int
    {
        return $this->capital_id;
    }


    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function setCapital_id($capital_id)
    {
        $this->capital_id= $capital_id;
        return $this;
    }



}