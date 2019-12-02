<?php

namespace App\Controller;

use App\Entity\Cours;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class PlanningController extends AbstractController
{
    /**
     * @Route("/planning", name="planning")
     */
    public function showPlanning(SerializerInterface $serializer)
    {
        $cours_list = $this->getDoctrine()->getRepository(Cours::class)->findAllCours();

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

      //  return $this->json([
      //      'planning' => $planning,
      //  ]);
    }

    /**
     * @Route("/planning/formateur", name="planning_formateur")
     */
    public function selectFormateur(SerializerInterface $serializer)
    {
        $repository = $this->getDoctrine()->getRepository(Cours::class);
        $cours_list = $repository->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $planning = $serializer->serialize($cours_list, 'json');

        echo $planning;

        return new JsonResponse();
    }


}
