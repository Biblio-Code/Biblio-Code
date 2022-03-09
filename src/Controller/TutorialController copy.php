<?php
namespace App\Controller;

// /src/Controller/TutorialController.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\Tutorial;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
// ...

class TutorialController extends AbstractController
{
    public function createAction(DocumentManager $dm)
    {
        $tutorial = new Tutorial();
        $tutorial->setTitulo('A Foo Bar');
        $tutorial->setCuerpo('CUERPO');

        $dm->persist($tutorial);
        $dm->flush();

        return new Response('Created product id ' . $tutorial->getId());
    }
}