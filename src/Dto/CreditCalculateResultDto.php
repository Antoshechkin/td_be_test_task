<?php

namespace App\Dto;

readonly class CreditCalculateResultDto
{
    public function __construct(
        public ?int $programId,
        public ?float $interestRate,
        public ?int $monthlyPayment,
        public ?string $title,
    )
    {
    }
}