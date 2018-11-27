<?php

namespace App\Repository;

use App\Entity\Traobject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Traobject|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traobject|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traobject[]    findAll()
 * @method Traobject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TraobjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Traobject::class);
    }


    public function findLast(int $limit): array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t')
            ->orderBy('t.createdAt', 'DESC')
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

}