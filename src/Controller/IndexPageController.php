<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpCache\Esi;
use Symfony\Component\Routing\Annotation\Route;

class IndexPageController extends AbstractController
{
    #[Route('/index/page', name: 'app_index_page')]
    public function index(EmployeRepository $RetraiterRepo): Response
    {
        $Employe=$RetraiterRepo->CountByIdEmploye();
        $Retraiter=$RetraiterRepo->CountByIdRetraiter(['StatueTravaille'=> 1]);
        return $this->render('index_page/index.html.twig', [
            'controller_name' => 'IndexPageController',
            'countEmploye'=>$Employe,
            'CountRetraiter'=>$Retraiter,
        ]);
    }
}
