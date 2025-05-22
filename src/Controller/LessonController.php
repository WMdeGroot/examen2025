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

            $this->addFlash('success', 'Het boek is toegevoegd');

            return $this->redirectToRoute('app_book');
        }

        return $this->render('lesson/index.html.twig', [
            'form' => $form,
        ]);
    }
}
