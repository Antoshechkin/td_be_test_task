<?php

namespace App\Controller\Api\v1;

use App\Dto\CreditCalculateDto;
use App\Interfaces\Api\v1\ICreditService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

#[Route('/api/v1/credit')]
final class CreditController extends AbstractController
{
    public function __construct(private readonly ICreditService $creditService)
    {
    }

    #[Route('/calculate', methods: ['GET'], format: 'json')]
    public function calculate(
        #[MapQueryString(validationFailedStatusCode: Response::HTTP_UNPROCESSABLE_ENTITY)]
        CreditCalculateDto $calculateDto
    ): JsonResponse
    {
        try {
            $result = $this->creditService->calculate($calculateDto);

            return $this->json($result);
        }
        catch (Throwable $exception) {
            return $this->json(['message' => $exception->getMessage()]);
        }
    }
}
