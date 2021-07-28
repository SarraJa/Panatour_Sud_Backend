<?php

namespace App\Repository;

use App\Entity\ServiceHotelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method ServiceHotelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceHotelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceHotelier[]    findAll()
 * @method ServiceHotelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceHotelierRepository extends ServiceEntityRepository
{
    private $manager;
    public function __construct(ManagerRegistry $registry,EntityManagerInterface $manager)
    {
        parent::__construct($registry, ServiceHotelier::class);
        $this->manager = $manager;
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
    public function saveHotel($libele, $adresse, $type, $prix)
    {
        $newHotel = new ServiceHotelier();

        $newHotel
            ->setLibele($libele)
            ->setAdresse($adresse)
            ->setType($type)
            ->setPrix($prix);

        $this->manager->persist($newHotel);
        $this->manager->flush();
    }


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
