<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route(path: '/articles', name: 'articles', methods: ['GET'])]
    public function list(): JsonResponse
    {
        return new JsonResponse(['Pesito', 'Novito']);
    }
}
