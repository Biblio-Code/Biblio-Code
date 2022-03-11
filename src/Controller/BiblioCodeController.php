<?php
namespace App\Controller;
use App\Entity\Tutorial;
use App\Entity\Comunidad;
use App\Entity\Provincia;
use App\Entity\Municipio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;


class BiblioCodeController extends AbstractController
{

    function verFormulario(ManagerRegistry $doctrine)
    {
        $comunidades = $doctrine->getRepository(Comunidad::class)->findAll();
        $provincias = $doctrine->getRepository(Provincia::class)->findAll();
        $municipios = $doctrine->getRepository(Municipio::class)->findAll();

        if (!$comunidades) {
            throw $this->createNotFoundException('No comunidad found');
        }
        if (!$provincias) {
            throw $this->createNotFoundException('No provincia found');
        }
        if (!$municipios) {
            throw $this->createNotFoundException('No municipio found');
        }

        return $this->render('formularioContacto.html.twig', array('comunidades' => $comunidades, 'provincias' => $provincias, 'municipios' => $municipios)); 

     }

    function verIndex(ManagerRegistry $dm)
    {
        $tutoriales = $dm->getRepository(Tutorial::class)->findAll();
        return $this->render('index.html.twig', ['tutoriales' => $tutoriales]); 
    }
}

