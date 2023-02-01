<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PaintingRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(PaintingRepository $paintingRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'offers' => $paintingRepository->findAll(),
        ]);
    }
}
