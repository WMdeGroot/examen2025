<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Form\LessonFormTypeForm;
use App\Form\LessonTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LessonController extends AbstractController
{
    #[Route('/lesson', name: 'app_lesson')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LessonTypeForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lessondata = $form->getData();
            $entityManager->persist($lessondata);
            $entityManager->flush();

            $this->addFlash('success', 'les is ingeplant');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('lesson/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/lesson/read', name: 'app_lesson_read')]
    public function readPage(EntityManagerInterface $entityManager): Response
    {
        $lesson = $entityManager->getRepository(Lesson::class)->findAll();

        return $this->render('lesson/read.html.twig', [
            'lesson' => $lesson
        ]);
    }

    #[Route('/lesson/update{id}', name: 'app_lesson_update')]
    public function updatePage(Request $request, EntityManagerInterface $entityManager, Lesson $lesson): Response
    {
        $form = $this->createForm(LessonTypeForm::class, $lesson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesson = $form->getData();
            $entityManager->persist($lesson);
            $entityManager->flush();

            $this->addFlash('success', 'les is ingeplant');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('lesson/update.html.twig', [
            'form' => $form,
        ]);
    }
}
