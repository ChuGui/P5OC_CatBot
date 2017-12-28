<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class ObservationRepository {

    private $em = null;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function observation() {

        return $this->em->getRepository('AppBundle:Actualite');

    }

    /**
     * @return EntityManager|null
     */
    public function getEm()
    {
        return $this->em;
    }


}