<?php

namespace App\Repository;

use App\Entity\RevClassrom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RevClassrom|null find($id, $lockMode = null, $lockVersion = null)
 * @method RevClassrom|null findOneBy(array $criteria, array $orderBy = null)
 * @method RevClassrom[]    findAll()
 * @method RevClassrom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RevClassromRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RevClassrom::class);
    }

    // /**
    //  * @return RevClassrom[] Returns an array of RevClassrom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RevClassrom
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
