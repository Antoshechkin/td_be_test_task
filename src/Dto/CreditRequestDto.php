<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

readonly class CreditRequestDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public int $carId,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public int $programId,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public int $initialPayment,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public int $loanTerm,
    )
    {
    }
}