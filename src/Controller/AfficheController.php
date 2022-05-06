<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AfficheController extends AbstractController
{
    #[Route('/affiche', name: 'affiche')]
    public function index(ManagerRegistry $doctrine ): Response
    {
        $repo = $doctrine->getRepository(Etudiant::class);
        $etudiants = $repo->findAll();
        return $this->render('affiche/index.html.twig', [
            'etudiants' => $etudiants
        ]);
    }
}
