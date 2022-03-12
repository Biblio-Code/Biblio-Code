<?php
namespace App\Controller;
use App\Entity\Tutorial;
use App\Entity\Comunidad;
use App\Entity\Municipio;
use App\Entity\Provincia;
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
        $usuario = $this->getUser();
        $tutoriales = $dm->getRepository(Tutorial::class)->findAll();
        return $this->render('index.html.twig', ['tutoriales' => $tutoriales, 'usuario' => $usuario]);
    }

    function verTutorial(ManagerRegistry $dm, $id)
    {
        $tutorial = $dm->getRepository(Tutorial::class)->find($id);
        return $this->render('verTutorial.twig', ['tutorial' => $tutorial]);
    }

    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

