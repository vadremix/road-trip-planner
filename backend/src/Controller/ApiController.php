<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/public', name: 'api_public', methods: ['GET'])]
    public function public(): JsonResponse
    {
        return new JsonResponse(['message' => 'This is a public route.']);
    }

    #[Route('/api/protected', name: 'api_protected', methods: ['GET'])]
    public function protected(): JsonResponse
    {
        return new JsonResponse(['message' => 'This is a protected route.']);
    }
}
