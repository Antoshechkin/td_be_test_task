<?php

namespace App\Services\Api\v1;

use App\Dto\CreditCalculateDto;
use App\Dto\CreditCalculateResultDto;
use App\Interfaces\Api\v1\ICreditService;
use App\Repository\CreditProgramRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Helpers\CalculateMonthlyPayment;

readonly class CreditService implements ICreditService
{
    public function __construct(private CreditProgramRepository $repository)
    {
    }

    public function calculate(CreditCalculateDto $calculateDto): CreditCalculateResultDto
    {
        if ($calculateDto->price <= $calculateDto->initialPayment)
            throw new BadRequestHttpException('price or initialPayment is incorrect');

        $creditBody = (float) $calculateDto->price - $calculateDto->initialPayment;

        $creditProgram = $this->repository->findCreditProgram($creditBody, $calculateDto->loanTerm);

        if (!$creditProgram)
            $creditProgram = $this->repository->findMax();

        $monthlyPayment = CalculateMonthlyPayment::calculate(
            $creditBody > $creditProgram->getMaxBody() ? $creditProgram->getMaxBody() : $creditBody,
            $creditProgram->getInterestRate(),
            $calculateDto->loanTerm
        );

        return (new CreditCalculateResultDto(
            $creditProgram->getProgramId(),
            $creditProgram->getInterestRate(),
            $monthlyPayment,
            $creditProgram->getTitle()
        ));
    }

}