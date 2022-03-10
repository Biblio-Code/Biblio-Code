<?php
// src/Document/Comunidad.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Provincia
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
    protected $provincia;

    /**
     * @MongoDB\Field(type="id")
     */
    protected $comunidad_id;

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

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function getComunidad_id(): ?int
    {
        return $this->comunidad_id;
    }

    public function getCapital_id(): ?int
    {
        return $this->capital_id;
    }



}