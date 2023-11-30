<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/characters')]
class CharacterController extends AbstractController
{
    #[Route('/', name: 'app_character_index', methods: ['GET'])]
    public function index(CharacterRepository $characterRepository, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse($serializer->normalize($characterRepository->findAll()));
    }

    #[Route('/{id}', name: 'app_character_show', methods: ['GET'])]
    public function show($id, CharacterRepository $characterRepository,  SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse($serializer->normalize($characterRepository->find($id)));
    }

    #[Route('/{id}/edit', name: 'app_character_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Character $character, CharacterRepository $characterRepository): Response
    {
        //TODO: add response data from front into Character object and save it into the DB
        //we should add some form of validation to avoid MYSQL injections and make sure the SQL recieves all data correctly formatted
        dump($request);

        //$characterRepository->save($character, true);
        
    }

    #[Route('/{id}', name: 'app_character_delete', methods: ['POST'])]
    public function delete(Request $request, Character $character, CharacterRepository $characterRepository): Response
    {
        dump($request);

        //$character = $characterRepository->find($request);
        /*
        if ($character) 
        {
            $characterRepository->remove($character, true);
        }
        */
    }
}
