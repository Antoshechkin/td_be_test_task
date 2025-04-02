<?php

namespace App\Entity;

use App\Dto\CreditRequestDto;
use App\Repository\CreditRequestRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreditRequestRepository::class)]
class CreditRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $carId = null;

    #[ORM\Column]
    private ?int $programId = null;

    #[ORM\Column]
    private ?int $initialPayment = null;

    #[ORM\Column]
    private ?int $loanTerm = null;

    public static function createFromDto(CreditRequestDto $creditRequestDto): CreditRequest
    {
        return (new self())
            ->setCarId($creditRequestDto->carId)
            ->setProgramId($creditRequestDto->programId)
            ->setInitialPayment($creditRequestDto->initialPayment)
            ->setLoanTerm($creditRequestDto->loanTerm);
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarId(): ?int
    {
        return $this->carId;
    }

    public function setCarId(?int $carId): static
    {
        $this->carId = $carId;

        return $this;
    }

    public function getProgramId(): ?int
    {
        return $this->programId;
    }

    public function setProgramId(?int $programId): static
    {
        $this->programId = $programId;

        return $this;
    }

    public function getInitialPayment(): ?int
    {
        return $this->initialPayment;
    }

    public function setInitialPayment(int $initialPayment): static
    {
        $this->initialPayment = $initialPayment;

        return $this;
    }

    public function getLoanTerm(): ?int
    {
        return $this->loanTerm;
    }

    public function setLoanTerm(int $loanTerm): static
    {
        $this->loanTerm = $loanTerm;

        return $this;
    }
}
