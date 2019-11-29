<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(SerializerInterface $serializer)
    {
        $repository = $this->getDoctrine()->getRepository(Competence::class);
        $competence_list = $repository->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $competenceSerialized = $serializer->serialize($competence_list, 'json');

        echo $competenceSerialized;

        return new JsonResponse();
   //     return $this->json([
     //       'competenceSerialized' => $competenceSerialized,
       // ]);
    }
}
