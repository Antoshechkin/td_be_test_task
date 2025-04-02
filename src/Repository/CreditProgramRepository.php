<?php

namespace App\Repository;

use App\Entity\CreditProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreditProgram>
 */
class CreditProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreditProgram::class);
    }

    public function findCreditProgram(float $creditBody, int $loanTerm): ?CreditProgram
    {
        $qb = $this->createQueryBuilder('cp')
            ->where('cp.maxBody >= :creditBody')
            ->setParameter('creditBody', $creditBody)
            ->andWhere('cp.maxLoanTerm >= :loanTerm')
            ->setParameter('loanTerm', $loanTerm)
            ->orderBy('cp.maxBody', 'ASC');

        $query = $qb->getQuery();

        return $query->setMaxResults(1)->getOneOrNullResult();
    }

    public function findMax(): ?CreditProgram
    {
        $qb = $this->createQueryBuilder('cp')
            ->orderBy('cp.maxBody', 'DESC');

        $query = $qb->getQuery();

        return $query->setMaxResults(1)->getOneOrNullResult();
    }
}
