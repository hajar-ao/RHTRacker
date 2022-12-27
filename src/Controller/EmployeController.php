<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\Employe1Type;
use App\Repository\AttestationRepository;
use App\Repository\EmployeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class EmployeController extends AbstractController

{   #[Route('/dashboard', name: 'dashboard')]
    public function Dashboard(EmployeRepository $RetraiterRepo): Response
    {
         $Employe=$RetraiterRepo->CountByIdEmploye();
         $Retraiter=$RetraiterRepo->CountByIdEmploye(["StatueTravaille"=> 1]);
        return $this->render('index_page/index.html.twig', [
            'controller_name' => 'IndexPageController',
             'countEmploye'=>$Employe,
             'CountRetraiter'=>$Retraiter,
        ]);
    }
    #[Route('/', name: 'app_employe_index', methods: ['GET'])]
    public function index(EmployeRepository $employeRepository): Response
    {
        
        return $this->render('employe/index.html.twig', [
       
        
            'employes' => $employeRepository->findAll(),
        ]);
    }
    #[Route('/ListeAttSalaire', name: 'app_employe_ListeSalire', methods: ['GET'])]
    public function ListeAttSalaire(AttestationRepository $AttestationRepository): Response
    {
        
        return $this->render('employe/listeAttSalaire.html.twig', [
       
        
            'attestations' => $AttestationRepository->findAll(),
        ]);
    }
    #[Route('/ListeAttTravaille', name: 'app_employe_ListeTravaille', methods: ['GET'])]
    public function ListeAttTravaille(AttestationRepository $AttestationRepository): Response
    {
        
        return $this->render('employe/listeAttTravaille.html.twig', [
       
        
            'attestations' => $AttestationRepository->findAll(),
        ]);
    }
    #[Route('/Retraiter', name: 'app_Empretraiter', methods: ['GET'])]
    public function ListeRetraiter(EmployeRepository $employeRepository): Response
    {

        return $this->render('employe/ListeRetr.html.twig', [
            'employes' => $employeRepository->findBy(['StatueTravaille'=> 1]),
        ]);
    }
    #[Route('/new', name: 'app_employe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmployeRepository $employeRepository): Response
    {
        $employe = new Employe();
        $form = $this->createForm(Employe1Type::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeRepository->save($employe, true);

            return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe/new.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employe_show', methods: ['GET'])]
    public function show(Employe $employe): Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        $form = $this->createForm(Employe1Type::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeRepository->save($employe, true);

            return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe/edit.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employe_delete', methods: ['POST'])]
    public function delete(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employe->getId(), $request->request->get('_token'))) {
            $employeRepository->remove($employe, true);
        }

        return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
    }
}
