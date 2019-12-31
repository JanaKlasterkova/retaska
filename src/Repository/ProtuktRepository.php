<?php

namespace App\Repository;

use App\Entity\Protukt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Protukt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Protukt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Protukt[]    findAll()
 * @method Protukt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProtuktRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Protukt::class);
    }

    // /**
    //  * @return Protukt[] Returns an array of Protukt objects
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
    public function findOneBySomeField($value): ?Protukt
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
