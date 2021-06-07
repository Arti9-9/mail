<?php

namespace App\Repository;

use App\Entity\Packege;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Packege|null find($id, $lockMode = null, $lockVersion = null)
 * @method Packege|null findOneBy(array $criteria, array $orderBy = null)
 * @method Packege[]    findAll()
 * @method Packege[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackegeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Packege::class);
    }

    // /**
    //  * @return Packege[] Returns an array of Packege objects
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
    public function findOneBySomeField($value): ?Packege
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
