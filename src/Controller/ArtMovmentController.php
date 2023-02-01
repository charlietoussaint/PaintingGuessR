<?php

namespace App\Controller;

use App\Entity\ArtMovment;
use App\Form\ArtMovmentType;
use App\Repository\ArtMovmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/art/movment')]
class ArtMovmentController extends AbstractController
{
    #[Route('/', name: 'app_art_movment_index', methods: ['GET'])]
    public function index(ArtMovmentRepository $artMovmentRepository): Response
    {
        return $this->render('art_movment/index.html.twig', [
            'art_movments' => $artMovmentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_art_movment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArtMovmentRepository $artMovmentRepository): Response
    {
        $artMovment = new ArtMovment();
        $form = $this->createForm(ArtMovmentType::class, $artMovment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artMovmentRepository->save($artMovment, true);

            return $this->redirectToRoute('app_art_movment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('art_movment/new.html.twig', [
            'art_movment' => $artMovment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_art_movment_show', methods: ['GET'])]
    public function show(ArtMovment $artMovment): Response
    {
        return $this->render('art_movment/show.html.twig', [
            'art_movment' => $artMovment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_art_movment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ArtMovment $artMovment, ArtMovmentRepository $artMovmentRepository): Response
    {
        $form = $this->createForm(ArtMovmentType::class, $artMovment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artMovmentRepository->save($artMovment, true);

            return $this->redirectToRoute('app_art_movment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('art_movment/edit.html.twig', [
            'art_movment' => $artMovment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_art_movment_delete', methods: ['POST'])]
    public function delete(Request $request, ArtMovment $artMovment, ArtMovmentRepository $artMovmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artMovment->getId(), $request->request->get('_token'))) {
            $artMovmentRepository->remove($artMovment, true);
        }

        return $this->redirectToRoute('app_art_movment_index', [], Response::HTTP_SEE_OTHER);
    }
}
