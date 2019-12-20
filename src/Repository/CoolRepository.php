<?php

namespace App\Repository;

use App\Entity\Cool;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Cool|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cool|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cool[]    findAll()
 * @method Cool[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cool::class);
    }

    // /**
    //  * @return Cool[] Returns an array of Cool objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cool
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
