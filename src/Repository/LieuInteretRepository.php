<?php

namespace App\Repository;

use App\Entity\LieuInteret;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LieuInteret|null find($id, $lockMode = null, $lockVersion = null)
 * @method LieuInteret|null findOneBy(array $criteria, array $orderBy = null)
 * @method LieuInteret[]    findAll()
 * @method LieuInteret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LieuInteretRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LieuInteret::class);
    }

    // /**
    //  * @return LieuInteret[] Returns an array of LieuInteret objects
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
    public function findOneBySomeField($value): ?LieuInteret
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
