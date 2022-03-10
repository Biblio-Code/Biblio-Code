<?php
namespace App\Controller;
use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ODM\MongoDB\DocumentManager;

class ControllerBiblioCode extends AbstractController
{
//VER NOTICIA

    function verFormulario(DocumentManager $dm)
    {
         $comunidades = $dm->getRepository(Comunidad::class)->findAll();
         return $this->render('formularioContacto.html.twig',['comunidades' => $comunidades]); 

     }

     function verIndex()
     {
          return $this->render('index.html.twig'); 
    }
}

