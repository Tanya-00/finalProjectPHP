<?php

namespace App\Repository;

use App\Entity\ItemsAtAuction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItemsAtAuction|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemsAtAuction|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemsAtAuction[]    findAll()
 * @method ItemsAtAuction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemsAtAuctionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemsAtAuction::class);
    }

    // /**
    //  * @return ItemsAtAuction[] Returns an array of ItemsAtAuction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ItemsAtAuction
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
