<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllByNameASC() {
        $qb = $this->em->createQueryBuilder('u');
        $qb->select('u')
            ->from('user', 'u')
            ->orderBy('u.name', 'ASC');
        return $qb->getQuery()->getResult();
    }
}
