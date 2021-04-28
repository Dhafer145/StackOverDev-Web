<?php

namespace App\Repository;

use App\Entity\PropositionProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PropositionProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropositionProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropositionProjet[]    findAll()
 * @method PropositionProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropositionProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropositionProjet::class);
    }

    // /**
    //  * @return PropositionProjet[] Returns an array of PropositionProjet objects
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
    public function findOneBySomeField($value): ?PropositionProjet
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
