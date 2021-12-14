<?php

namespace App\Repository;

use App\Entity\CompanyInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompanyInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyInformation[]    findAll()
 * @method CompanyInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyInformation::class);
    }

    // /**
    //  * @return CompanyInformation[] Returns an array of CompanyInformation objects
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
    public function findOneBySomeField($value): ?CompanyInformation
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
