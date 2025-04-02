<?php

namespace App\Controller\Api\v1;

use App\Dto\CreditRequestDto;
use App\Entity\CreditRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

#[Route('/api/v1/request')]
final class CreditRequestController extends AbstractController
{
    #[Route('', methods: ['POST'], format: 'json')]
    public function store(
        #[MapRequestPayload(validationFailedStatusCode: Response::HTTP_UNPROCESSABLE_ENTITY)]
        CreditRequestDto $creditRequestDto,
        EntityManagerInterface $entityManager
    ): JsonResponse
    {
        try {
            $creditRequest = CreditRequest::createFromDto($creditRequestDto);
            $entityManager->persist($creditRequest);
            $entityManager->flush();

            return $this->json(['success' => true], Response::HTTP_CREATED);
        }
        catch (Throwable $exception) {
            return $this->json(['message' => $exception->getMessage()]);
        }
    }
}
