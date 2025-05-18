<?php

namespace App\Controller;

use App\Dto\RouteRequestDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class RouteCalculationController extends AbstractController
{
    #[Route('/route', name: 'calculate_route', methods: ['POST'])]
    public function index(#[MapRequestPayload] RouteRequestDto $routeRequest): JsonResponse
    {
        // todo: enqueue
        return $this->json([
            'message' => 'Valid request, ready to queue',
            'info' => $routeRequest,
        ]);
    }
}
