<?php

namespace AppBundle\Repository;

/**
 * ObservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ObservationRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        $qb = $this->createQueryBuilder('o');
        $qb->orderBy('o.updateAt','DESC');
        return $qb->getQuery()->getResult();
    }

    public function findAllWaiting()
    {
        $qb = $this->createQueryBuilder('o');
        $qb->where('o.isValidated = false')->orderBy('o.updateAt','DESC');
        return $qb->getQuery()->getResult();
    }

    public function findAllValidated()
    {
        $qb = $this->createQueryBuilder('o');
        $qb->where('o.isValidated = true')->orderBy('o.updateAt','DESC');
        return $qb->getQuery()->getResult();
    }

    public function findValidatedByBirdsId($birdsId)
    {
        $qb = $this->createQueryBuilder('o');
        $qb
            ->andWhere('o.isValidated = true')
            ->andWhere('o.bird IN (:birdsId)')
            ->setParameter('birdsId', $birdsId)
            ->orderBy('o.updateAt','DESC');
        return $qb->getQuery()->getResult();
    }

    public function findAllNoValidated()
    {
        $qb = $this->createQueryBuilder('o');
        $qb->where('o.isValidated = false')->orderBy('o.updateAt','DESC');
        return $qb->getQuery()->getResult();
    }
}
