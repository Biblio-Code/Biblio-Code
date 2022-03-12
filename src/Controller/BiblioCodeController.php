<?php
namespace App\Controller;
use App\Entity\Tutorial;
use App\Entity\Comunidad;
use App\Entity\Provincia;
use App\Entity\Municipio;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\AssignOp\Concat;
use PhpParser\Node\Expr\Cast\Array_;

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

    function verTablaTutoriales(ManagerRegistry $doctrine)
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

            array_push($results->results, $result);
        }

        return $this->render('tablaTutoriales.html.twig', array('tutoriales' => $tutoriales)); 

     }

     function jsonTutoriales(ManagerRegistry $doctrine)
    {
        $tutoriales = $doctrine->getRepository(Tutorial::class)->findAll();

        if (!$tutoriales) {
            throw $this->createNotFoundException('No Tutorial found');
        }

        $data = new \stdClass();
        $data->data = array();

        foreach ($tutoriales as $tutorial) {
            $data2 = new \stdClass();
            $result = array();
            $id = $tutorial->getId();
            $titulo = $tutorial->getTitulo();
            $lenguaje = $tutorial->getLenguaje();
            $url = "<a href='/tutorial/".$id."'>Click aquí</a>";

            array_push($result, $id);
            array_push($result, $titulo);
            array_push($result, $lenguaje);
            array_push($result, $url);
            array_push($data->data, $result);
        }



        return new JsonResponse($data);

     }
}

