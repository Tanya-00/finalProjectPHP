<?php

namespace App\Controller;

use App\Entity\Byuer;
use App\Form\ByuerType;
use App\Repository\ByuerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/byuer')]
class ByuerController extends AbstractController
{
    #[Route('/', name: 'byuer_index', methods: ['GET'])]
    public function index(ByuerRepository $byuerRepository): Response
    {
        return $this->render('byuer/index.html.twig', [
            'byuers' => $byuerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'byuer_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $byuer = new Byuer();
        $form = $this->createForm(ByuerType::class, $byuer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($byuer);
            $entityManager->flush();

            return $this->redirectToRoute('byuer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('byuer/new.html.twig', [
            'byuer' => $byuer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'byuer_show', methods: ['GET'])]
    public function show(Byuer $byuer): Response
    {
        return $this->render('byuer/show.html.twig', [
            'byuer' => $byuer,
        ]);
    }

    #[Route('/{id}/edit', name: 'byuer_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Byuer $byuer): Response
    {
        $form = $this->createForm(ByuerType::class, $byuer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('byuer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('byuer/edit.html.twig', [
            'byuer' => $byuer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'byuer_delete', methods: ['POST'])]
    public function delete(Request $request, Byuer $byuer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$byuer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($byuer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('byuer_index', [], Response::HTTP_SEE_OTHER);
    }
}
