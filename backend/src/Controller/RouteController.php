<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class RouteController extends AbstractController
{
    #[Route('/route', name: 'calculate_route', methods: ['POST'])]
    public function index(Request $request): JsonResponse
    {
        // todo: stub
        $data = json_decode($request->getContent(), true);

        if (!isset($data['start'], $data['end'], $data['range'])) {
            return $this->json(['error' => 'Missing required fields'], 400);
        }

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RouteController.php',
        ]);
    }
}
