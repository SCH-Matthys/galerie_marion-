<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AquatiqueController extends AbstractController{
    #[Route('/aquatique', name: 'app_aquatique')]
    public function index(): Response
    {
        return $this->render('aquatique/aquatic.html.twig', [
            'controller_name' => 'AquatiqueController',
        ]);
    }
}
