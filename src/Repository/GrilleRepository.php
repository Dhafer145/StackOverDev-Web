<?php

namespace App\Repository;

use App\Entity\Grille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Grille|null find($id, $lockMode = null, $lockVersion = null)
 * @method Grille|null findOneBy(array $criteria, array $orderBy = null)
 * @method Grille[]    findAll()
 * @method Grille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grille::class);
    }

    // /**
    //  * @return Grille[] Returns an array of Grille objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Grille
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
