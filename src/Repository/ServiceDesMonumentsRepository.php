<?php

namespace App\Repository;

use App\Entity\ServiceDesMonuments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceDesMonuments|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceDesMonuments|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceDesMonuments[]    findAll()
 * @method ServiceDesMonuments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceDesMonumentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceDesMonuments::class);
    }

    // /**
    //  * @return ServiceDesMonuments[] Returns an array of ServiceDesMonuments objects
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

    /*
    public function findOneBySomeField($value): ?ServiceDesMonuments
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
