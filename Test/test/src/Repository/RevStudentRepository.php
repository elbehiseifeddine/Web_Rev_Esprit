<?php

namespace App\Repository;

use App\Entity\RevStudent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RevStudent|null find($id, $lockMode = null, $lockVersion = null)
 * @method RevStudent|null findOneBy(array $criteria, array $orderBy = null)
 * @method RevStudent[]    findAll()
 * @method RevStudent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RevStudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RevStudent::class);
    }

    // /**
    //  * @return RevStudent[] Returns an array of RevStudent objects
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
    public function findOneBySomeField($value): ?RevStudent
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
