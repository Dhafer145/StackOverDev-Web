<?php

namespace App\Repository;

use App\Entity\JournalProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JournalProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method JournalProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method JournalProjet[]    findAll()
 * @method JournalProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JournalProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JournalProjet::class);
    }

    // /**
    //  * @return JournalProjet[] Returns an array of JournalProjet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JournalProjet
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
