<?php

namespace App\Repository;

use App\Entity\ServiceHotelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceHotelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceHotelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceHotelier[]    findAll()
 * @method ServiceHotelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceHotelierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceHotelier::class);
    }

    // /**
    //  * @return ServiceHotelier[] Returns an array of ServiceHotelier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    public function findOneBySomeField($value): ?ServiceHotelier
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
