<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tutorial;


class AppFixturesTest extends Fixture
{
    public function load(ObjectManager $manager): void
    {
     //------------------Tutoriales------------------//
     $tutorial1 = new Tutorial();
     $tutorial1->setTitulo("Laura");
     $tutorial1->setLenguaje("Moreno");
     $tutorial1->setCodigo("repartidor@gmail.com");
     $tutorial1->setTextoTutorial("repartidor@gmail.com");
     $manager->persist($tutorial1);

     $tutorial2 = new Tutorial();
     $tutorial2->setTitulo("Laura");
     $tutorial2->setLenguaje("Moreno");
     $tutorial2->setCodigo("repartidor@gmail.com");
     $tutorial2->setTextoTutorial("repartidor@gmail.com");
     $manager->persist($tutorial2);

     $tutorial3 = new Tutorial();
     $tutorial3->setTitulo("Laura");
     $tutorial3->setLenguaje("Moreno");
     $tutorial3->setCodigo("repartidor@gmail.com");
     $tutorial3->setTextoTutorial("repartidor@gmail.com");
     $manager->persist($tutorial3);

     $manager->flush();
 }
}
