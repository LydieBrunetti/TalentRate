<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Entity\Formateur;
use PhpParser\Node\Expr\New_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use \DateTime;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class PlanningController extends AbstractController
{
    /**
     * @Route("/planning", name="planning", methods="GET")
     */
    public function showPlanning(SerializerInterface $serializer)
    {
        $cours_list = $this->getDoctrine()->getRepository(Cours::class)->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $planning = $serializer->serialize($cours_list, 'json', [
          'circular_reference_handler' => function ($planning) {
              return $planning->getId();
          }
      ]);

      echo $planning;

      return new JsonResponse();
    }

    /**
     * @Route("/planning/create", name="planning_cours_create", methods="POST")
     */
    public function createCours(Request $request)
    {
        
        if (0 === strpos($request->headers->get('Content-Type'),'application/json')) {
            $cours = new Cours;
            $data = json_decode($request->getContent(), true);

            $cours->setLibelle($data['libelle']);

       
            $strDateDebut = $data['date_debut'];
            $dateDebut = DateTime::createFromFormat('Y-m-d H:i:s', $strDateDebut);
            $cours->setDateDebut($dateDebut);

            $strDateFin = $data['date_fin'];
            $dateFin = DateTime::createFromFormat('Y-m-d H:i:s', $strDateFin);
            $cours->setDateFin($dateFin);

            $strFormateur = $data['formateur'];
            
            $formateur = $this->getDoctrine()->getRepository(Formateur::class)->findBy([$strFormateur]);

            $cours->setFormateur($formateur);

            $cours->setPromotion($data['promotion']);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cours);
        $entityManager->flush();

        }
        

        return new Response('', Response::HTTP_CREATED);
    }
}
