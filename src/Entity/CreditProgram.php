<?php

namespace App\Entity;

use App\Repository\CreditProgramRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreditProgramRepository::class)]
class CreditProgram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?int $programId = null;

    #[ORM\Column(length: 191)]
    private ?string $title = null;

    #[ORM\Column]
    private ?float $interestRate = null;

    #[ORM\Column]
    private ?int $maxBody = null;

    #[ORM\Column]
    private ?int $maxLoanTerm = null;

    public function getProgramId(): ?int
    {
        return $this->programId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getInterestRate(): ?float
    {
        return $this->interestRate;
    }

    public function setInterestRate(float $interestRate): static
    {
        $this->interestRate = $interestRate;

        return $this;
    }

    public function getMaxBody(): ?int
    {
        return $this->maxBody;
    }

    public function setMaxBody(int $maxBody): static
    {
        $this->maxBody = $maxBody;

        return $this;
    }

    public function getMaxLoanTerm(): ?int
    {
        return $this->maxLoanTerm;
    }

    public function setMaxLoanTerm(?int $maxLoanTerm): static
    {
        $this->maxLoanTerm = $maxLoanTerm;

        return $this;
    }
}
