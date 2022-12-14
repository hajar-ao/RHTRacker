<?php

namespace App\Controller;

use App\Entity\Attestation;
use App\Form\Attestation1Type;
use App\Repository\AttestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user/Attestation')]
class AttestationController extends AbstractController
{
    
    #[Route('/', name: 'app_attestation_index', methods: ['GET'])]
    public function index(AttestationRepository $attestationRepository): Response
    {
        return $this->render('attestation/index.html.twig', [
            'attestations' => $attestationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_attestation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AttestationRepository $attestationRepository): Response
    {
        $attestation = new Attestation();
        $form = $this->createForm(Attestation1Type::class, $attestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attestationRepository->save($attestation, true);

            return $this->redirectToRoute('app_attestation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attestation/new.html.twig', [
            'attestation' => $attestation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attestation_show', methods: ['GET'])]
    public function show(Attestation $attestation): Response
    {
        return $this->render('attestation/show.html.twig', [
            'attestation' => $attestation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_attestation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Attestation $attestation, AttestationRepository $attestationRepository): Response
    {
        $form = $this->createForm(Attestation1Type::class, $attestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $attestationRepository->save($attestation, true);

            return $this->redirectToRoute('app_attestation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('attestation/edit.html.twig', [
            'attestation' => $attestation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_attestation_delete', methods: ['POST'])]
    public function delete(Request $request, Attestation $attestation, AttestationRepository $attestationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attestation->getId(), $request->request->get('_token'))) {
            $attestationRepository->remove($attestation, true);
        }

        return $this->redirectToRoute('app_attestation_index', [], Response::HTTP_SEE_OTHER);
    }
}
