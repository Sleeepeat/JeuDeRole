<?php

namespace App\Repository;

use App\Entity\Catalalogue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Catalalogue>
 *
 * @method Catalalogue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Catalalogue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Catalalogue[]    findAll()
 * @method Catalalogue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalalogueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Catalalogue::class);
    }

    //    /**
    //     * @return Catalalogue[] Returns an array of Catalalogue objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Catalalogue
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
