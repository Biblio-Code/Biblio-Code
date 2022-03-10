<?php
namespace App\Controller;

// /src/Controller/ComunidadController.php
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\Comunidad;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
// ...

class ComunidadController extends AbstractController
{
    function verComunidad(DocumentManager $dm)
    {

        $comunidad = new Comunidad();
        $comunidad->setNombre("Andalucia");
        $comunidad->setSlug("andalucia");
        $comunidad->setCapital_Id(1);

    $dm->persist($comunidad);
    $dm->flush();


        $comunidades = $dm->getRepository(Comunidad::class)->findAll();
        $results = new \stdClass();
        $results->count = count($comunidades);
        $results->results = array();
    
        foreach ($comunidades as $comunidad) {
            $result = new \stdClass();
            $result->id = $comunidad->getId();
            $result->nombre = $comunidad->getNombre();
      
            array_push($results->results, $result);
          }

          $data_to_twig = json_encode($comunidades);
          $data_to_twig = json_decode($data_to_twig, true);
    
          return $this->render('formularioContacto.html.twig',[
            'comunidades' => $data_to_twig,
        ]);
    }
}