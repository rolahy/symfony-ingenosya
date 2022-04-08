<?php

namespace App\Factory\User;

use App\Entity\User\User;

final class UserFactory
{
    public static function createFromExternalAPI(array $externalUserData): User
    {
        return (new User())
            ->setGender($externalUserData['gender'] ?? null)
            ->setPhone($externalUserData['phone'] ?? null)
            ->setCell($externalUserData['cell'] ?? null)
            ->setNat($externalUserData['nat'] ?? null)
            ->setEmail($externalUserData['email'] ?? null)
            ->setName(UserNameFactory::createFromExternalAPI($externalUserData['name'] ?? []))
            ->setLocation(UserLocationFactory::createFromExternalAPI($externalUserData['location'] ?? []))
            ->setLogin(UserLoginFactory::createFromExternalAPI($externalUserData['login'] ?? []))
            ->setRegistered(UserRegistrerFactory::createFromExternalAPI($externalUserData['registered'] ?? []))
            ->setPicture(UserPictureFactory::createFromExternalAPI($externalUserData['picture'] ?? []))
        ;
    }
}
