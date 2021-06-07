<?php

namespace App\Repository;

use App\Entity\Extradition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Extradition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Extradition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Extradition[]    findAll()
 * @method Extradition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtraditionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Extradition::class);
    }

    // /**
    //  * @return Extradition[] Returns an array of Extradition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Extradition
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
