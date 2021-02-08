<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtenteRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/utenti", name="api_utenti")
     */
    public function index(UtenteRepository $UtenteRepository,SerializerInterface $serializer)
    {
        $utenti = $UtenteRepository->findAll();

        $jsonUtenti = $serializer->serialize(
            $utenti,
            'json'
        );
      
        return new JsonResponse($jsonUtenti, 200, [], true);

    }
}
