<?php

namespace App\Interfaces\Api\v1;

use App\Entity\Car;

interface ICarService
{
    public function getCars(): array;

    public function getCarById(int $id): ?Car;
}