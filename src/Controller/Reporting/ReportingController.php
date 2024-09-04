<?php

namespace App\Controller\Reporting;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reporting', name: 'app_reporting_')]
class ReportingController extends AbstractController
{
    #[Route('/journal_caisse', name: 'journal_caisse')]
    public function journalCaisse(): Response
    {
        return $this->render('caisse/etat.html.twig');
    }

    #[Route('/fdb', name: 'fdb')]
    public function fdb(): Response
    {
        return $this->render('fdb/etat.html.twig');
    }
}
