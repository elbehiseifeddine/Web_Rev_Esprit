<?php

namespace App\Repository;

use App\Entity\RevClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RevClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method RevClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method RevClub[]    findAll()
 * @method RevClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RevClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RevClub::class);
    }

    // /**
    //  * @return RevClub[] Returns an array of RevClub objects
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
    public function findOneBySomeField($value): ?RevClub
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
