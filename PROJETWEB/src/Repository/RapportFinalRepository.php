<?php

namespace App\Repository;

use App\Entity\RapportFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RapportFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportFinal[]    findAll()
 * @method RapportFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportFinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportFinal::class);
    }

    // /**
    //  * @return RapportFinal[] Returns an array of RapportFinal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RapportFinal
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
