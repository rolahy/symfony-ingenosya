<?php

namespace App\Factory\User;

use App\Entity\User\UserLocation;

final class UserLocationFactory
{
    public static function createFromExternalAPI(array $userLocation): UserLocation
    {
        return (new UserLocation())
            ->setStreet($userLocation['street'] ?? null)
            ->setCity($userLocation['city'] ?? null)
            ->setState($userLocation['state'] ?? null)
            ->setPostcode($userLocation['postcode'] ?? null)
        ;
    }
}
