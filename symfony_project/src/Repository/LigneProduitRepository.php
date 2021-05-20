<?php

namespace App\Repository;

use App\Entity\LigneProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LigneProduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneProduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneProduit[]    findAll()
 * @method LigneProduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneProduit::class);
    }

    // /**
    //  * @return LigneProduit[] Returns an array of LigneProduit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneProduit
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
