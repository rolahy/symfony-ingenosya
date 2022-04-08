<?php

namespace App\Factory\User;

use App\Entity\User\UserPicture;

final class UserPictureFactory
{
    public static function createFromExternalAPI(array $userPicture): UserPicture
    {
        return (new UserPicture())
            ->setLarge($userPicture['large'] ?? null)
            ->setMedium($userPicture['medium'] ?? null)
            ->setThumbnail($userPicture['thumbnail'] ?? null)
        ;
    }
}
