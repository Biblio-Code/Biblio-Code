<?php
// src/Document/Comunidad.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Comunidad
{

    protected $id;

    protected $slug;

    protected $comunidad;

    protected $capital_id;

    public function getId()
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getComunidad(): ?string
    {
        return $this->comunidad;
    }

    public function getCapital_id(): ?int
    {
        return $this->capital_id;
    }



}