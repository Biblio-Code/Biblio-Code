<?php

namespace App\Controller;

// /src/Controller/TutorialController.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Tutorial;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\Persistence\ManagerRegistry;
// ...

class TutorialController extends AbstractController
{
    public function getTutorial(ManagerRegistry $doctrine, $id)
    {
        $tutorial = $doctrine->getRepository(Tutorial::class)->find($id);

        if (!$tutorial) {
            throw $this->createNotFoundException('No tutorial found for id ' . $id);
        }

        $result = new \stdClass();
        $result->id = $tutorial->getId();
        $result->titulo = $tutorial->getTitulo();
        $result->codigo = $tutorial->getCodigo();
        $result->texto = $tutorial->getTextoTutorial();

        return new JsonResponse($result);
    }

    public function getAllTutorial(ManagerRegistry $doctrine)
    {
        $tutoriales = $doctrine->getRepository(Tutorial::class)->findAll();

        if (!$tutoriales) {
            throw $this->createNotFoundException('No Tutorial found');
        }

        $results = new \stdClass();
        $results->count = count($tutoriales);
        $results->results = array();

        foreach ($tutoriales as $tutorial) {
            $result = new \stdClass();
            $result->id = $tutorial->getId();
            $result->titulo = $tutorial->getTitulo();
            $result->lenguaje = $tutorial->getLenguaje();
            $result->url = $this->generateUrl('getTutorial', [
                'id' => $result->id,
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            array_push($results->results, $result);
        }

        return new JsonResponse($results);
    }

    public function postTutorial(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $tutorial = new Tutorial();
        $tutorial->setTitulo($request->request->get("titulo"));
        $tutorial->setTextoTutorial($request->request->get("texto"));
        $tutorial->setCodigo($request->request->get("codigo"));
        $tutorial->setLenguaje($request->request->get("lenguaje"));
        $entityManager->persist($tutorial);
        $entityManager->flush();
        $result = new \stdClass();
        $result->id = $tutorial->getId();
        $result->titulo = $tutorial->getTitulo();
        $result->codigo = $tutorial->getCodigo();
        $result->texto = $tutorial->getCodigo();
        $result->lenguaje = $tutorial->getLenguaje();
        return new JsonResponse($result, 201);
    }

    function putTutorial(ManagerRegistry $doctrine, Request $request, $id)
    {
        $entityManager = $doctrine->getManager();
        $tutorial = $doctrine->getRepository(Tutorial::class)->find($id);
        if ($tutorial == null) {
            return new JsonResponse([
                'error' => 'Tutorial not found'
            ], 404);
        }
        if ($request->request->get("titulo") != null) {
            $tutorial->setTitulo($request->request->get("titulo"));
        }
        if ($request->request->get("lenguaje") != null) {
            $tutorial->setLenguaje($request->request->get("lenguaje"));
        }
        if ($request->request->get("texto") != null) {
            $tutorial->setTextoTutorial($request->request->get("texto"));
        }
        if ($request->request->get("codigo") != null) {
            $tutorial->setCodigo($request->request->get("codigo"));
        }
        $entityManager->flush();
        $result = new \stdClass();
        $result->id = $tutorial->getId();
        $result->titulo = $tutorial->getTitulo();
        $result->lenguaje = $tutorial->getLenguaje();
        $result->texto = $tutorial->getTextoTutorial();
        $result->codigo = $tutorial->getCodigo();
        return new JsonResponse($result);
    }

    function deleteTutorial(ManagerRegistry $doctrine, $id)
    {
        $entityManager = $doctrine->getManager();
        $tutorial = $doctrine->getRepository(Tutorial::class)->find($id);
        if ($tutorial == null) {
            return new JsonResponse([
                'error' => 'Tutorial not found'
            ], 404);
        }

        $entityManager->remove($tutorial);
        $entityManager->flush();

        // Devuelve una respuesta vacia
        return new JsonResponse(null, 204);
    }

    function getAllDatos(ManagerRegistry $doctrine)
    {
        $tutoriales = $doctrine->getRepository(Tutorial::class)->findAll();

        if (!$tutoriales) {
            throw $this->createNotFoundException('No Tutoriales found');
        }

        $data = new \stdClass();
        $data->data = array();

        foreach ($tutoriales as $tutorial) {
            $data2 = new \stdClass();
            $result = array();
            $id = $tutorial->getId();
            $titulo = $tutorial->getTitulo();
            $lenguaje = $tutorial->getLenguaje();
            $url = "<a href='/tutorial/" . $id . "'>Click aquí</a>";

            array_push($result, $id);
            array_push($result, $titulo);
            array_push($result, $lenguaje);
            array_push($result, $url);
            array_push($data->data, $result);
        }
        return new JsonResponse($data);
    }
}
