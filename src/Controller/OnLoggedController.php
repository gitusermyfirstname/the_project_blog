<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OnLoggedController extends AbstractController
{
    #[Route('/on_logged', name: 'app_on_logged')]
    public function index(): Response
    {
        return $this->render('on_logged/index.html.twig', [
            'controller_name' => 'OnLoggedController',
        ]);
    }
}
