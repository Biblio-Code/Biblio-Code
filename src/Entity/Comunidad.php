<?php

namespace App\Entity;

use App\Repository\ComunidadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComunidadRepository::class)
 */
class Comunidad
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
    private $comunidad;

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

    public function getComunidad(): ?string
    {
        return $this->comunidad;
    }

    public function setComunidad(string $comunidad): self
    {
        $this->comunidad = $comunidad;

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
