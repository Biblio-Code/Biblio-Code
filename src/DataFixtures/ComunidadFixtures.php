<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Comunidad;

class ComunidadFixtures extends Fixture
{
    public function load(ObjectManager $dm): void
    {
        $comunidad = new Comunidad();
        $comunidad->setComunidad("Andalucía");
        $comunidad->setSlug("andalucia");
        $comunidad->setCapitalId(1);

    $dm->persist($comunidad);
    $dm->flush();
    }
}
