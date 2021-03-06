<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function Accueil()
    {
        return $this->render('base.html.twig');
    }


    /**
     * @Route("/allAnimal", name="animal")
     */
    public function index(AnimalRepository $repository): Response
    {
        $animaux = $repository->findAll();
        //print_r($animaux);
        return $this->render('animal/index.html.twig',[
            "animaux" => $animaux
        ]);

    }

    /**
     * @Route("/animal/{id}", name="afficher_animal")
     */
    public function afficherAnimal(AnimalRepository $repository, $id)
    {
        $unAnimal = $repository->find($id);
        return $this->render('animal/afficheAnimal.html.twig',[
            "animal" => $unAnimal
        ]);

    }

    /**
     * @Route("/animal_leger/{poids}", name="afficher_animal_leger")
     */
    public function afficherAnimauxLeger(AnimalRepository $repository, $poids)
    {
        $animaux= $repository->getAnimauxLegers($poids);
        return $this->render('animal/index.html.twig',[
            "animaux" => $animaux
        ]);
    }

}