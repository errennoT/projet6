<?php

namespace App\Repository;

use App\Entity\PictureTrick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PictureTrick|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureTrick|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureTrick[]    findAll()
 * @method PictureTrick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureTrickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureTrick::class);
    }

    // /**
    //  * @return PictureTrick[] Returns an array of PictureTrick objects
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
    public function findOneBySomeField($value): ?PictureTrick
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
