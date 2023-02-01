<?php

namespace App\Controller;

use App\Entity\ArtMovment;
use App\Entity\Painting;
use App\Form\PaintingType;
use App\Repository\PaintingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/painting')]
class PaintingController extends AbstractController
{
    #[Route('/', name: 'app_painting_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(PaintingRepository $paintingRepository): Response
    {
        return $this->render('painting/index.html.twig', [
            'paintings' => $paintingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_painting_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, PaintingRepository $paintingRepository): Response
    {
        $painting = new Painting();
        $form = $this->createForm(PaintingType::class, $painting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paintingRepository->save($painting, true);

            return $this->redirectToRoute('app_painting_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('painting/new.html.twig', [
            'painting' => $painting,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_painting_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function show(Painting $painting): Response
    {
        return $this->render('painting/show.html.twig', [
            'painting' => $painting,
        ]);
    }

    // #[Route('/quizz/{id}', name: 'app_painting_show', methods: ['GET'])]
    // public function quizz(Painting $painting, PaintingRepository $paintingRepository): Response
    // {
    //     return $this->render('painting/quizz.html.twig', [
    //         'painting' => $painting,
    //         'paintings' => $paintingRepository->findAnswers(),
    //     ]);
    // }



    #[Route('/{id}/edit', name: 'app_painting_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Painting $painting, PaintingRepository $paintingRepository): Response
    {
        $form = $this->createForm(PaintingType::class, $painting);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paintingRepository->save($painting, true);

            return $this->redirectToRoute('app_painting_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('painting/edit.html.twig', [
            'painting' => $painting,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_painting_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Painting $painting, PaintingRepository $paintingRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $painting->getId(), $request->request->get('_token'))) {
            $paintingRepository->remove($painting, true);
        }

        return $this->redirectToRoute('app_painting_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/quizz/{id}', name: 'app_painting_quizz', methods: ['GET', 'POST'])]
    public function quizz(Painting $painting, PaintingRepository $paintingRepository, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $selectedAnswer = $request->request->get('selectedAnswer');
            $verificationResult = $this->verifyAnswer($selectedAnswer, $painting->getPaintingName());
        } else {
            $verificationResult = null;
        }

        return $this->render('painting/quizz.html.twig', [
            'painting' => $painting,
            'paintings' => $paintingRepository->findAnswers(),
            'verificationResult' => $verificationResult,
        ]);
    }

    // #[Route('/quizz', name: 'app_painting_quizz', methods: ['GET', 'POST'])]
    // public function quiz(Painting $painting, PaintingRepository $paintingRepository, Request $request): Response
    // {
    //     if ($request->isMethod('POST')) {
    //         $selectedAnswer = $request->request->get('selectedAnswer');
    //         $verificationResult = $this->verifyAnswer($selectedAnswer, $painting->getPaintingName());
    //     } else {
    //         $verificationResult = null;
    //     }

    //     $paintings = $paintingRepository->findAll();
    //     $painting = $paintings[array_rand($paintings)];

    //     return $this->render('painting/quizz.html.twig', [
    //         'painting' => $painting->getId(),
    //         // 'id' => $painting->getId(),
    //         'paintings' => $paintingRepository->findAnswers(),
    //         'verificationResult' => $verificationResult,
    //     ]);
    // }

    private function verifyAnswer(string $selectedAnswer, string $realAnswer): string
    {
        if ($selectedAnswer === $realAnswer) {
            return 'Correct answer!';
        }
        return 'Wrong answer.';
    }

    #[Route('/painting/random', name: 'app_random_painting', methods: ['GET', 'POST'])]
    public function randomPainting(PaintingRepository $paintingRepository)
    {
        $paintings = $paintingRepository->findAll();
        $randomPainting = $paintings[array_rand($paintings)];

        return $this->redirectToRoute('app_painting_show', [
            'id' => $randomPainting->getId(),
        ]);
    }
}
