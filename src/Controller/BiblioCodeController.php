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
        $usuario = $this->getUser();
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

        return $this->render('formularioContacto.html.twig', array('comunidades' => $comunidades, 'provincias' => $provincias, 'municipios' => $municipios, 'usuario' => $usuario));
    }

    function verIndex(ManagerRegistry $dm)
    {
        $usuario = $this->getUser();
        $tutoriales = $dm->getRepository(Tutorial::class)->findAll();
        return $this->render('index.html.twig', ['tutoriales' => $tutoriales, 'usuario' => $usuario]);
    }

    function verTutorial(ManagerRegistry $dm, $id)
    {
        $usuario = $this->getUser();
        $tutorial = $dm->getRepository(Tutorial::class)->find($id);
        return $this->render('verTutorial.twig', ['tutorial' => $tutorial, 'usuario' => $usuario]);
    }

    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    function verTablaTutoriales()
    {
        $usuario = $this->getUser();
        return $this->render('tablaTutoriales.html.twig', ['usuario' => $usuario]);
    }


    function verGraficaTutoriales()
    {
        $usuario = $this->getUser();
        return $this->render('grafica.html.twig', ['usuario' => $usuario]);
    }

    function getAllDatosTitulo(ManagerRegistry $doctrine)
    {
        $tutoriales = $doctrine->getRepository(Tutorial::class)->findAll();

        if (!$tutoriales) {
            throw $this->createNotFoundException('No Tutoriales found');
        }

        $data = new \stdClass();
        $data->data = array();
        $datalenguaje = new \stdClass();
        $datalenguaje->lenguaje = array();

        foreach ($tutoriales as $tutorial) {
            $result = array();
            $result2 = array();
            $titulo = $tutorial->getId();
            $lenguaje2 = $tutorial->getLenguaje();

            array_push($result, $titulo);
            array_push($result2, $lenguaje2);
            array_push($data->data, $result);
            array_push($datalenguaje->lenguaje, $result2);

            $respuesta = [
                "etiquetas" => $datalenguaje,
                "datos" => $data
            ];
        }
        return new JsonResponse($respuesta);
    }
    function getAllDatosLenguaje(ManagerRegistry $doctrine)
    {
        $tutoriales = $doctrine->getRepository(Tutorial::class)->findAll();

        if (!$tutoriales) {
            throw $this->createNotFoundException('No Tutoriales found');
        }

        $data = new \stdClass();
        $data->data = array();

        foreach ($tutoriales as $tutorial) {
            $result = array();
            $lenguaje = $tutorial->getLenguaje();

            array_push($result, $lenguaje);
            array_push($data->data, $result);
        }
        return new JsonResponse($data);
    }

    function verQuienessomos()
    {
        $usuario = $this->getUser();
        return $this->render('sobreNosotros.html.twig', ['usuario' => $usuario]);
    }
}
