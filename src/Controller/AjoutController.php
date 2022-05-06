<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutController extends AbstractController
{
    #[Route('/ajout/{id?0}', name: 'ajout')]
    public function index(ManagerRegistry $doctrine , Request $request , $id): Response
    {
        if ($id ) {
            $repo = $doctrine->getRepository(Etudiant::class);
            $Etudiant = $repo->findOneBy(['id'=>$id],[]);  
              }
        else {
            $Etudiant = new Etudiant();

        }
        $form = $this->createForm(EtudiantType::class,$Etudiant);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager=$doctrine->getManager();
            $manager->persist($Etudiant);
            $manager->flush();
            return $this->redirectToRoute("affiche");
        }
        else {
            return $this->render('ajout/index.html.twig', [
                'form' => $form->createView() ]);
        }

       
    }
}
