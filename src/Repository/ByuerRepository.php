<?php

namespace App\Repository;

use App\Entity\Byuer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Byuer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Byuer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Byuer[]    findAll()
 * @method Byuer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ByuerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Byuer::class);
    }

    // /**
    //  * @return Byuer[] Returns an array of Byuer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Byuer
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
