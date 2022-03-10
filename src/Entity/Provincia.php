<?php

namespace App\Entity;

use App\Repository\ProvinciaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProvinciaRepository::class)
 */
class Provincia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provincia;

    /**
     * @ORM\Column(type="integer")
     */
    private $comunidad_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $capital_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getComunidadId(): ?int
    {
        return $this->comunidad_id;
    }

    public function setComunidadId(int $comunidad_id): self
    {
        $this->comunidad_id = $comunidad_id;

        return $this;
    }

    public function getCapitalId(): ?int
    {
        return $this->capital_id;
    }

    public function setCapitalId(int $capital_id): self
    {
        $this->capital_id = $capital_id;

        return $this;
    }
}
