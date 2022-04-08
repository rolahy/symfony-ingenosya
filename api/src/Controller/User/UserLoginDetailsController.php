<?php

namespace App\Controller\User;

use App\Entity\User\User;
use App\Entity\User\UserLogin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserLoginDetailsController extends AbstractController
{
    public function __invoke(Request $request): User
    {
        /**
         * @var UserLogin
         */
        $userLogin = $request->get('data');

        return $userLogin->getUser();
    }
}
