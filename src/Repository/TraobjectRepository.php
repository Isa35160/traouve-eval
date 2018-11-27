<?php

namespace App\Repository;

use App\Entity\Traobject;
use App\Entity\State;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
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


    public function findTraobjectLost(int $limit) : array
    {
        $qb = $this->createQueryBuilder('t');

        $qb = $qb->select('t', 't.state')
            ->orderBy('t.createdAt', 'DESC')
            ->where(State::LOST)
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }

}