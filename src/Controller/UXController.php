<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UXController extends AbstractController
{
    #[Route('/u_x', name: 'ux')]
    public function index(): Response
    {
        return $this->render('ux/index.html.twig', [
            'controller_name' => 'UXController',
        ]);
    }
}
