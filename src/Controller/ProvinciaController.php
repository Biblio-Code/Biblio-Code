<?php
namespace App\Controller;

// /src/Controller/ComunidadController.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\Comunidad;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
// ...

class ProvinciaController extends AbstractController
{
    function verProvincia(DocumentManager $dm)
    {
        $provincias = $dm->getRepository(Provincia::class)->findAll();
        $results = new \stdClass();
        $results->count = count($provincias);
        $results->results = array();
    
        foreach ($provincias as $provincia) {
            $result = new \stdClass();
            $result->id = $provincia->getId();
            $result->nombre = $provincia->getProvincia();
      
            array_push($results->results, $result);
          }

          $data_to_twig = json_encode($provincias);
          $data_to_twig = json_decode($data_to_twig, true);
    
          return $this->render('formularioContacto.html.twig',[
            'provincias' => $data_to_twig,
        ]);
    }
}