<?php

namespace App\Repository;

use App\Entity\Brightness;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Brightness|null find($id, $lockMode = null, $lockVersion = null)
 * @method Brightness|null findOneBy(array $criteria, array $orderBy = null)
 * @method Brightness[]    findAll()
 * @method Brightness[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrightnessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brightness::class);
    }

    // /**
    //  * @return Brightness[] Returns an array of Brightness objects
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
    public function findOneBySomeField($value): ?Brightness
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
