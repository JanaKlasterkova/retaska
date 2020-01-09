<?php

namespace App\Repository;

use App\Entity\Ordr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ordr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordr[]    findAll()
 * @method Ordr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordr::class);
    }

    // /**
    //  * @return Ordr[] Returns an array of Ordr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ordr
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
