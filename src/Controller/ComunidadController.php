<?php
namespace App\Controller;

// /src/Controller/TutorialController.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\Tutorial;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Response;
// ...

class ComunidadController extends AbstractController
{
    function verComunidad()
    {
         return $this->render('index.html.twig'); 

    }
}