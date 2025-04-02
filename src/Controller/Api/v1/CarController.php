<?php

namespace App\Controller\Api\v1;

use App\Interfaces\Api\v1\ICarService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Throwable;

#[Route('/api/v1/cars')]
final class CarController extends AbstractController
{
    private ICarService $carService;

    public function __construct(ICarService $carService)
    {
        $this->carService = $carService;
    }

    #[Route('/', methods: ['GET'], format: 'json')]
    public function getCars(): JsonResponse
    {
        try {
            $cars = $this->carService->getCars();

            return $this->json($cars, context: [
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['model']
            ]);
        }
        catch (Throwable $exception) {
            return $this->json(['message' => $exception->getMessage()]);
        }
    }

    #[Route('/{id}', methods: ['GET'], format: 'json')]
    public function getCarById(int $id): JsonResponse
    {
        try {
            $car = $this->carService->getCarById($id);

            return $this->json($car);
        }
        catch (Throwable $exception) {
            return $this->json(['message' => $exception->getMessage()]);
        }
    }
}
