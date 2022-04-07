<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserListController extends AbstractController
{
    #[Route('', name: 'front_user_list')]
    public function index(): Response
    {
        return $this->render('user/user_list/index.html.twig', [
            'controller_name' => 'UserListController',
        ]);
    }
}
