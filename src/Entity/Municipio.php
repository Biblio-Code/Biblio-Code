<?php

namespace App\Entity;

use App\Repository\MunicipioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MunicipioRepository::class)
 */
class Municipio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $provincia_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvinciaId(): ?int
    {
        return $this->provincia_id;
    }

    public function setProvinciaId(int $provincia_id): self
    {
        $this->provincia_id = $provincia_id;

        return $this;
    }
}
