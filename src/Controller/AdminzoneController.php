<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminzoneController extends AbstractController
{
    #[Route('/adminzone', name: 'adminzone')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository -> findAll();
        return $this->render('adminzone/index.html.twig', [
            'users' => $users
        ]);
    }
}
