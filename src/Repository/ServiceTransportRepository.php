<?php

namespace App\Repository;

use App\Entity\ServiceTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceTransport|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceTransport|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceTransport[]    findAll()
 * @method ServiceTransport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceTransport::class);
    }

    // /**
    //  * @return ServiceTransport[] Returns an array of ServiceTransport objects
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


    public function findOneBySomeField($value): ?ServiceTransport
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
