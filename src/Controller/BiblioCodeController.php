<?php
namespace App\Controller;
use App\Entity\Tutorial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;


class BiblioCodeController extends AbstractController
{
//VER NOTICIA

    function verFormulario(ManagerRegistry $dm)
    {
        $comunidades = $dm->getRepository(Comunidad::class)->findAll();
        return $this->render('formularioContacto.html.twig',['comunidades' => $comunidades]); 
    }

    function verIndex(ManagerRegistry $dm)
    {
        $tutoriales = $dm->getRepository(Tutorial::class)->findAll();
        return $this->render('index.html.twig', ['tutoriales' => $tutoriales]); 
    }
}

