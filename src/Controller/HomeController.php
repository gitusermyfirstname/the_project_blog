<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Article;


class HomeController extends AbstractController
{
    /**
     * Page d'accueil
     * 
     * @return  Response
     */
    // #[Route('/', name: 'homepage')]
    public function index(EntityManagerInterface $em): Response
    {
        // Entity Manager de Symfony
        // $em         = $this->getDoctrine()->getManager();
        // On récupère tous les articles disponibles en base de données
        $articles   = $em->getRepository(Article::class)->findAll();

        return $this->render('home/index.html.twig', [
            'articles'  => $articles
        ]);
    }
}