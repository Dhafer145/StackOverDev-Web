<?php

namespace App\Repository;

use App\Entity\ProcesVerbal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProcesVerbal|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProcesVerbal|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProcesVerbal[]    findAll()
 * @method ProcesVerbal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcesVerbalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProcesVerbal::class);
    }

    // /**
    //  * @return ProcesVerbal[] Returns an array of ProcesVerbal objects
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
    public function findOneBySomeField($value): ?ProcesVerbal
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
