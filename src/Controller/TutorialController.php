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
            $result->url = $this->generateUrl('getTutorial', [
                'id' => $result->id,
            ], UrlGeneratorInterface::ABSOLUTE_URL);

            array_push($results->results, $result);
        }

        return new JsonResponse($results);
    }

    public function postTutorial(ManagerRegistry $doctrine,Request $request)
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
        $tutorial->setTitulo($request->request->get("titulo"));
        $tutorial->setLenguaje($request->request->get("lenguaje"));
        $tutorial->setTextoTutorial($request->request->get("texto"));
        $tutorial->setCodigo($request->request->get("codigo"));
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
}
