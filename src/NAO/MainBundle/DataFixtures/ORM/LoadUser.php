<?php
// src/OC/UserBundle/DataFixtures/ORM/LoadUser.php

namespace NAO\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use NAO\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNames = array('Alexandre', 'Marine', 'Anna');

        foreach ($listNames as $name) {
            // On crée l'utilisateur
            $user = new User;

            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setUsername($name);
            $user->setPassword($name);

            // On ne se sert pas du sel pour l'instant
            $user->setSalt('');
            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_USER'));

            // On le persiste
            $manager->persist($user);
        }

        $listNaturalistesNames = array ('Eric', "Antoine");

        foreach ($listNaturalistesNames as $naturalistesName)
        {
            $userNat = new User();
            $userNat->setUsername($naturalistesName);
            $userNat->setPassword($naturalistesName);
            $userNat->setSalt('');
            $userNat->setRoles(array('ROLE_NATURALISTE'));

            $manager->persist($userNat);
        }

        $admin = 'admin';
        $userAdmin = new User();
        $userAdmin->setUsername($admin);
        $userAdmin->setPassword($admin);
        $userAdmin->setSalt('');
        $userAdmin->setRoles(array('ROLE_ADMIN'));

         $manager->persist($userAdmin);

        // On déclenche l'enregistrement
        $manager->flush();
    }
}