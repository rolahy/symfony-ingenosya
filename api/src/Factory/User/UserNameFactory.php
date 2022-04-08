<?php

namespace App\Factory\User;

use App\Entity\User\UserName;

final class UserNameFactory
{
    public static function createFromExternalAPI(array $userName): UserName
    {
        return (new UserName())
            ->setTitle($userName['title'] ?? null)
            ->setFirst($userName['first'] ?? null)
            ->setLast($userName['last'] ?? null)
        ;
    }
}
