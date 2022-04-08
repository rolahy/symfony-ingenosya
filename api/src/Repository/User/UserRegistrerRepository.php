<?php

namespace App\Repository\User;

use App\Entity\User\UserRegistrer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserRegistrer|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserRegistrer|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserRegistrer[]    findAll()
 * @method UserRegistrer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRegistrerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserRegistrer::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UserRegistrer $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(UserRegistrer $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return UserRegistrer[] Returns an array of UserRegistrer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserRegistrer
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
