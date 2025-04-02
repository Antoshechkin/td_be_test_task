<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

readonly class CreditCalculateDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public ?int $price,

        #[Assert\NotBlank]
        #[Assert\Type('double')]
        public ?float $initialPayment,

        #[Assert\NotBlank]
        #[Assert\Type('integer')]
        public ?int $loanTerm
    ) {
    }
}