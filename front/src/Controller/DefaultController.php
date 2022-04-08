<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('', name: 'front_index')]
    public function __invoke(): Response
    {
        return $this->redirectToRoute('front_user_list', [
            'programmingLangage' => 'symfony',
        ]);
    }
}
