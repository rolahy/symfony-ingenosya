<?php

namespace App\Factory\User;

use App\Entity\User\UserRegistrer;
use DateTime;

final class UserRegistrerFactory
{
    public static function createFromExternalAPI(array $userRegistrer): UserRegistrer
    {
        return (new UserRegistrer())
            ->setDate($userRegistrer['date'] ? new DateTime($userRegistrer['date']) : new DateTime())
            ->setAge($userRegistrer['age'] ?? 0)
        ;
    }
}
