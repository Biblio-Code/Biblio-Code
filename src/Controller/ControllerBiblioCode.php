<?php
namespace App\Controller;
use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ControllerBiblioCode extends AbstractController
{
//VER NOTICIA
     function verFormulario()
     {
          return $this->render('formularioContacto.html.twig'); 

     }

     function verIndex()
     {
          return $this->render('index.html.twig'); 

     }
}

?>
