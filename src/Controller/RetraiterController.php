<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/retraiter')]
class RetraiterController extends AbstractController
{
    #[Route('/', name: 'app_retraiter_index', methods: ['GET'])]
    public function index(EmployeRepository $employeRepository): Response
    {
        return $this->render('retraiter/index.html.twig', [
            'employes' => $employeRepository->findAll(),
        ]);
    }
    #[Route('/Retraiter', name: 'app_retraiter', methods: ['GET'])]
    public function ListeRetraiter(EmployeRepository $employeRepository): Response
    {

        return $this->render('retraiter/ListeRetr.html.twig', [
            'employes' => $employeRepository->findBy(['StatueTravaille'=> 1]),
        ]);
    }

    #[Route('/new', name: 'app_retraiter_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmployeRepository $employeRepository): Response
    {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeRepository->save($employe, true);

            return $this->redirectToRoute('app_retraiter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('retraiter/new.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_retraiter_show', methods: ['GET'])]
    public function show(Employe $employe): Response
    {
        return $this->render('retraiter/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_retraiter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeRepository->save($employe, true);

            return $this->redirectToRoute('app_retraiter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('retraiter/edit.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_retraiter_delete', methods: ['POST'])]
    public function delete(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employe->getId(), $request->request->get('_token'))) {
            $employeRepository->remove($employe, true);
        }

        return $this->redirectToRoute('app_retraiter_index', [], Response::HTTP_SEE_OTHER);
    }
}
