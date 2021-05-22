<?php

namespace App\Repository;

use App\Entity\TypeRevenus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeRevenus|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRevenus|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRevenus[]    findAll()
 * @method TypeRevenus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRevenusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeRevenus::class);
    }

    // /**
    //  * @return TypeRevenus[] Returns an array of TypeRevenus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeRevenus
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
