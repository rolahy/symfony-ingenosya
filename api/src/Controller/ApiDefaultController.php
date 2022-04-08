<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiDefaultController extends AbstractController
{
    #[Route('', name: 'api_default')]
    public function index(): Response
    {
        return $this->redirectToRoute('api_entrypoint');
    }
}
