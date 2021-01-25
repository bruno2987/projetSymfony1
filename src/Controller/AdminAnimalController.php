<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAnimalController extends AbstractController
{
    #[Route('/admin/animal', name: 'admin_animal')]
    
    public function modification(Animal $animal, Request $request, EntityManager $entityManager){
        $form = $this->createForm(AnimalType::class);
        return $this->render('admin_animal/index.html.twig', [
            'controller_name' => 'AdminAnimalController',
        ]);
    }


}
