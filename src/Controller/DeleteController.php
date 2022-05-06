<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController extends AbstractController
{
    #[Route('/delete/{id?0}', name: 'delete')]
    public function index(Etudiant $Etudiant = null,ManagerRegistry $doctrine): Response
    {
        {          if (!$Etudiant) {
            $this->addFlash("error","personne non trouvable");
        }
        else {
            $manager=$doctrine->getManager();
            $manager->remove($Etudiant);
            $manager->flush();
            $this->addFlash("success","deleted!");
        
            }
            return $this->redirectToRoute("affiche");
        
    }
}
}
