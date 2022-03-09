<?php
// src/Document/Tutorial.php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Tutorial
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $titulo;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $codigo;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $texto;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $lenguaje;

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    public function getLenguaje(): ?string
    {
        return $this->lenguaje;
    }

    public function setLenguaje(string $lenguaje): self
    {
        $this->lenguaje = $lenguaje;

        return $this;
    }
}