<?php

namespace App\Repository;

use App\Entity\PublicEquipments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PublicEquipments|null find($id, $lockMode = null, $lockVersion = null)
 * @method PublicEquipments|null findOneBy(array $criteria, array $orderBy = null)
 * @method PublicEquipments[]    findAll()
 * @method PublicEquipments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicEquipmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PublicEquipments::class);
    }

    // /**
    //  * @return PublicEquipments[] Returns an array of PublicEquipments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PublicEquipments
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
