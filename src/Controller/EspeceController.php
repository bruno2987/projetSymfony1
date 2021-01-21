<?php

namespace App\Controller;

use App\Entity\Espece;
use App\Repository\EspeceRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspeceController extends AbstractController
{
    /**
     * @Route("/especes", name="allEspece")
     */
    public function index(EspeceRepository $repository): Response
    {
        $especes = $repository->findAll();
        return $this->render('espece/index.html.twig', [
            "especes" => $especes
        ]);
    }
}
