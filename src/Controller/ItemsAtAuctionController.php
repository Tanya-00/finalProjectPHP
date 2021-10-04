<?php

namespace App\Controller;

use App\Entity\ItemsAtAuction;
use App\Form\ItemsAtAuctionType;
use App\Repository\ItemsAtAuctionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/items/at/auction')]
class ItemsAtAuctionController extends AbstractController
{
    #[Route('/', name: 'items_at_auction_index', methods: ['GET'])]
    public function index(ItemsAtAuctionRepository $itemsAtAuctionRepository): Response
    {
        return $this->render('items_at_auction/index.html.twig', [
            'items_at_auctions' => $itemsAtAuctionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'items_at_auction_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $itemsAtAuction = new ItemsAtAuction();
        $form = $this->createForm(ItemsAtAuctionType::class, $itemsAtAuction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($itemsAtAuction);
            $entityManager->flush();

            return $this->redirectToRoute('items_at_auction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('items_at_auction/new.html.twig', [
            'items_at_auction' => $itemsAtAuction,
            'form' => $form,
        ]);
    }

    #[Route("/search", name: 'items_at_auction_search', methods: ['GET','POST'])]
    public function search(Request $request): Response {
        $lastName = $request->query->get('name');
        $items_at_auctions = $this->getDoctrine()->getRepository(ItemsAtAuction::class)->findBy(['name'=>$lastName]);
        return $this->render('items_at_auction/search.html.twig', [
            'items_at_auctions' => $items_at_auctions,
        ]);
    }

    #[Route('/{id}', name: 'items_at_auction_show', methods: ['GET'])]
    public function show(ItemsAtAuction $itemsAtAuction): Response
    {
        return $this->render('items_at_auction/show.html.twig', [
            'items_at_auction' => $itemsAtAuction,
        ]);
    }

    #[Route('/{id}/edit', name: 'items_at_auction_edit', methods: ['GET','POST'])]
    public function edit(Request $request, ItemsAtAuction $itemsAtAuction): Response
    {
        $form = $this->createForm(ItemsAtAuctionType::class, $itemsAtAuction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('items_at_auction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('items_at_auction/edit.html.twig', [
            'items_at_auction' => $itemsAtAuction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'items_at_auction_delete', methods: ['POST'])]
    public function delete(Request $request, ItemsAtAuction $itemsAtAuction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$itemsAtAuction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($itemsAtAuction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('items_at_auction_index', [], Response::HTTP_SEE_OTHER);
    }
}
