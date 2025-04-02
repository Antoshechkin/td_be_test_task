<?php

declare(strict_types=1);

namespace App\Helpers;

final class CalculateMonthlyPayment
{
    public static function calculate(float $creditBody, float $interestRate, int $loanTerm): float
    {
        $monthlyInterestRate = ($interestRate / 100) / 12;

        return ($creditBody * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$loanTerm));
    }
}