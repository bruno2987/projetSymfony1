<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use App\Entity\Personne;
use App\Repository\PersonneRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'personne')]
    public function index(PersonneRepository $repository): Response
    {
        $personne = $repository->findAll();
        return $this->render('personne/index.html.twig', [
            "personnes" => $personne,
        ]);
    }

        /**
     * @Route("/personne/{id}", name="afficher_personne")
     */
    public function afficherAnimal(AnimalRepository $repository, $id)
    {
        $unePersonne = $repository->find($id);
        return $this->render('personne/affichePersonne.html.twig',[
            "personne" => $unePersonne
        ]);

    }
}

