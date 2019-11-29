<?php

namespace App\Repository;

use App\Entity\Cadrer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Cadrer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cadrer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cadrer[]    findAll()
 * @method Cadrer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CadrerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cadrer::class);
    }

    // /**
    //  * @return Cadrer[] Returns an array of Cadrer objects
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
    public function findOneBySomeField($value): ?Cadrer
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
