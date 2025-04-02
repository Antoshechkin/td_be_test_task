<?php

namespace App\Services\Api\v1;

use App\Entity\Car;
use App\Interfaces\Api\v1\ICarService;
use App\Repository\CarRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

readonly class CarService implements ICarService
{

    public function __construct(private CarRepository $carRepository)
    {
    }

    public function getCars(): array
    {
        return $this->carRepository->findAll();
    }

    public function getCarById(int $id): ?Car
    {
        $car = $this->carRepository->findOneBy(['id' => $id]);

        if (is_null($car))
            throw new NotFoundHttpException('Car not found');

        return $car;
    }
}