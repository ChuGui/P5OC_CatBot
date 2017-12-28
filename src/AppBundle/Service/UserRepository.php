<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class UserRepository {

    private $em = null;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function userRepository() {

        return $this->em->getRepository('AppBundle:User');

    }

    public function findAllByNameASC() {
        $qb = $this->userRepository()->createQueryBuilder('u');
        $qb->orderBy('u.username','ASC');
        return $qb->getQuery()->getResult();
    }

    /**
     * @return EntityManager|null
     */
    public function getEm()
    {
        return $this->em;
    }
}