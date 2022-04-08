<?php

namespace App\Factory\User;

use App\Entity\User\UserLogin;
use Symfony\Component\Uid\Uuid;

final class UserLoginFactory
{
    public static function createFromExternalAPI(array $data): UserLogin
    {
        $userLogin = new UserLogin();

        $userLogin
            ->setUsername($data['username'] ?? null)
            ->setPassword($data['password'] ?? null)
            ->setSalt($data['salt'] ?? null)
            ->setMd5($data['md5'] ?? null)
            ->setSha1($data['sha1'] ?? null)
            ->setSha256($data['sha256'] ?? null)
            ->setUuid($data['uuid'] ? Uuid::fromString($data['uuid']) : null)
        ;

        return $userLogin;
    }
}
