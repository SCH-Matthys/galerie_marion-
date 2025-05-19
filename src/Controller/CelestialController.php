<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CelestialController extends AbstractController{
    #[Route('/celestial', name: 'app_celestial')]
    public function index(): Response
    {
        return $this->render('celestial/celestial.html.twig', [
            'controller_name' => 'CelestialController',
        ]);
    }
}
