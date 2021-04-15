<?php

namespace App\Repository;

use App\Entity\PlanTravail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanTravail|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanTravail|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanTravail[]    findAll()
 * @method PlanTravail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanTravailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanTravail::class);
    }

    // /**
    //  * @return PlanTravail[] Returns an array of PlanTravail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanTravail
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
