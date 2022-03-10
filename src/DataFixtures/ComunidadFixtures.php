<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Document\Comunidad;

class ComunidadFixtures extends Fixture
{
    public function load(ObjectManager $dm): void
    {
        $comunidad = new Comunidad();
        $comunidad->setNombre("Andalucía");
        $comunidad->setSlug("andalucia");
        $comunidad->setId(1);
        $comunidad->setCapital_Id(1);

    $dm->persist($comunidad);
    $dm->flush();

        $manager->flush();
    }
}
