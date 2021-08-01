<?php

namespace App\Repository;

use App\Entity\ServiceRestauration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceRestauration|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceRestauration|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceRestauration[]    findAll()
 * @method ServiceRestauration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceRestaurationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceRestauration::class);
    }

    // /**
    //  * @return ServiceRestauration[] Returns an array of ServiceRestauration objects
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


    public function findOneBySomeField($value): ?ServiceRestauration
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
