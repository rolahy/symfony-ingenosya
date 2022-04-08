<?php

namespace App\Manager\User;

use App\Entity\User\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function importUsers(ArrayCollection $users): void
    {
        /**
         * @var User $user
         */
        foreach ($users as $user) {
            $this->em->persist($user);
        }

        $this->em->flush();
    }
}
