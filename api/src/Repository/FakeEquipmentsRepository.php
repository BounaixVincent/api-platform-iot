<?php

namespace App\Repository;

use App\Entity\FakeEquipments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FakeEquipments|null find($id, $lockMode = null, $lockVersion = null)
 * @method FakeEquipments|null findOneBy(array $criteria, array $orderBy = null)
 * @method FakeEquipments[]    findAll()
 * @method FakeEquipments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FakeEquipmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FakeEquipments::class);
    }

    // /**
    //  * @return FakeEquipments[] Returns an array of FakeEquipments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FakeEquipments
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
