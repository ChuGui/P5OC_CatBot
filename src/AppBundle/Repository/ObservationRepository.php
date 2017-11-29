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
}
