<?php
namespace App\Controller;

// /src/Controller/TutorialController.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\Tutorial;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
// ...

class TutorialController extends AbstractController
{
    public function getTutorial(DocumentManager $dm, $id)
    {
        $tutorial = $dm->getRepository(Tutorial::class)->find($id);

    if (! $tutorial) {
        throw $this->createNotFoundException('No product found for id ' . $id);
    }

    $result = new \stdClass();
    $result->id = $tutorial->getId();
    $result->titulo = $tutorial->getTitulo();
    $result->codigo = $tutorial->getCodigo();
    $result->texto = $tutorial->getTexto();

    return new JsonResponse($result);
    }

    public function getAllTutorial(DocumentManager $dm)
    {
        $tutoriales = $dm->getRepository(Tutorial::class)->findAll();

    if (! $tutoriales) {
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

    return new JsonResponse($result);
    }
    
    public function postTutorial(DocumentManager $dm, Request $request)
    {
        $tutorial = new Tutorial();
        $tutorial->setTitulo($request->request->get("titulo"));
        $tutorial->setTexto($request->request->get("texto"));
        $tutorial->setCodigo($request->request->get("codigo"));
        $tutorial->setLenguaje($request->request->get("lenguaje"));
        $dm->persist($tutorial);
        $dm->flush();
        $result = new \stdClass();
        $result->id = $tutorial->getId();
        $result->titulo = $tutorial->getTitulo();
        $result->codigo = $tutorial->getCodigo();
        $result->texto = $tutorial->getCodigo();
        $result->lenguaje = $tutorial->getLenguaje();
        return new JsonResponse($result, 201);
    }

    


}