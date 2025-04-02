<?php

namespace App\Interfaces\Api\v1;

use App\Dto\CreditCalculateDto;
use App\Dto\CreditCalculateResultDto;

interface ICreditService
{
    public function calculate(CreditCalculateDto $calculateDto): CreditCalculateResultDto;
}