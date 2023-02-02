<?php

namespace App\Repository;

use App\Entity\Painting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Painting>
 *
 * @method Painting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Painting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Painting[]    findAll()
 * @method Painting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaintingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Painting::class);
    }

    public function save(Painting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Painting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    // public function findAnswers(): array
    // {
    //     $queryBuilder = $this->createQueryBuilder('p')
    //         ->join('a.id', 'o')
    //         ->setMaxResults(4)
    //         ->where('p.movment_key_id = o')
    //         ->getQuery();
    //     return $queryBuilder->getResult();
    // }


    // public function findAnswers(): array
    // {
    //     $queryBuilder = $this->createQueryBuilder('p')
    //         ->join('p.movmentKey', 'a')
    //         ->setMaxResults(4)
    //         ->where('p.movmentKey = a.id')
    //         ->getQuery();
    //     return $queryBuilder->getResult();
    // }

    public function findAnswers(int $movmentId): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->join('p.movmentKey', 'a', 'WITH', 'p.movmentKey = a.id')
            ->where('p.movmentKey = :movmentId')
            ->setParameter('movmentId', $movmentId)
            ->setMaxResults(4)
            ->orderBy('p.id', 'ASC')
            ->getQuery();
        return $queryBuilder->getResult();
    }

    //    /**
    //     * @return Painting[] Returns an array of Painting objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Painting
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
