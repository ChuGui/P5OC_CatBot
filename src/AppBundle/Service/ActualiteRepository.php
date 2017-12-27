<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class ActualiteRepository {

    private $em = null;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function actualite() {

        return $this->em->getRepository('AppBundle:Actualite');

    }
}