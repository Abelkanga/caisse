<?php
namespace App\Controller;

use App\Service\ExportService;
use App\Service\PdfService;
use App\Repository\FdbRepository;
use App\Repository\BonapprovisionnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExportController extends AbstractController
{
    private $exportService;
    private $pdfService;
    private $fdbRepository;
    private $bonapprovisionnementRepository;

    public function __construct(ExportService $exportService, PdfService $pdfService, FdbRepository $fdbRepository, BonapprovisionnementRepository $bonapprovisionnementRepository)
    {
        $this->exportService = $exportService;
        $this->pdfService = $pdfService;
        $this->fdbRepository = $fdbRepository;
        $this->bonapprovisionnementRepository = $bonapprovisionnementRepository;
    }

    #[Route('/export/excel', name: 'export_excel', methods:['GET','POST'])]
    public function exportToExcel(): Response
    {
        $dateDebut = new \DateTime('2024-06-01');
        $dateFin = new \DateTime('2024-06-05');

        $fdbData = $this->fdbRepository->createQueryBuilder('fdb')
            ->leftJoin('fdb.caisse', 'caisse')
            ->addSelect('caisse')
            ->where('fdb.date BETWEEN :date_debut AND :date_fin')
            ->setParameter('date_debut', $dateDebut)
            ->setParameter('date_fin', $dateFin)
            ->getQuery()
            ->getResult();

        $bonApprovisionnementData = $this->bonapprovisionnementRepository->createQueryBuilder('ba')
            ->leftJoin('ba.caisse', 'caisse')
            ->addSelect('caisse')
            ->where('ba.date BETWEEN :date_debut AND :date_fin')
            ->setParameter('date_debut', $dateDebut)
            ->setParameter('date_fin', $dateFin)
            ->getQuery()
            ->getResult();

        $data = [];
        $solde = 0;

        foreach ($fdbData as $fdb) {
            $sortie = $fdb->getTotal();
            $solde -= $sortie;
            $data[] = [
                'date' => $fdb->getDate()->format('Y-m-d'),
                'nature' => $fdb->getTypeExpense(),
                'libelle' => $fdb->getExpense(),
                'entree' => null,
                'sortie' => $sortie,
                'solde' => $solde,
            ];
        }

        foreach ($bonApprovisionnementData as $bonapprovisionnement) {
            $entree = $bonapprovisionnement->getMontanttotal();
            $solde += $entree;
            $data[] = [
                'date' => $bonapprovisionnement->getDate()->format('Y-m-d'),
                'nature' => $bonapprovisionnement->getNature(),
                'libelle' => $bonapprovisionnement->getLibelle(),
                'entree' => $entree,
                'sortie' => null,
                'solde' => $solde,
            ];
        }

        return $this->exportService->exportToExcel($data);
    }

    #[Route('/export/pdf', name: 'export_pdf', methods:['GET', 'POST'])]
    public function exportToPdf(): Response
    {
        $dateDebut = new \DateTime('2024-06-01');
        $dateFin = new \DateTime('2024-06-05');

        $fdbData = $this->fdbRepository->createQueryBuilder('fdb')
            ->leftJoin('fdb.caisse', 'caisse')
            ->addSelect('caisse')
            ->where('fdb.date BETWEEN :date_debut AND :date_fin')
            ->setParameter('date_debut', $dateDebut)
            ->setParameter('date_fin', $dateFin)
            ->getQuery()
            ->getResult();

        $bonApprovisionnementData = $this->bonapprovisionnementRepository->createQueryBuilder('ba')
            ->leftJoin('ba.caisse', 'caisse')
            ->addSelect('caisse')
            ->where('ba.date BETWEEN :date_debut AND :date_fin')
            ->setParameter('date_debut', $dateDebut)
            ->setParameter('date_fin', $dateFin)
            ->getQuery()
            ->getResult();

        $data = [];
        $solde = 0;

        foreach ($fdbData as $fdb) {
            $sortie = $fdb->getTotal();
            $solde -= $sortie;
            $data[] = [
                'date' => $fdb->getDate()->format('Y-m-d'),
                'nature' => $fdb->getTypeExpense(),
                'libelle' => $fdb->getExpense(),
                'entree' => null,
                'sortie' => $sortie,
                'solde' => $solde,
            ];
        }

        foreach ($bonApprovisionnementData as $bonapprovisionnement) {
            $entree = $bonapprovisionnement->getMontanttotal();
            $solde += $entree;
            $data[] = [
                'date' => $bonapprovisionnement->getDate()->format('Y-m-d'),
                'nature' => $bonapprovisionnement->getNature(),
                'libelle' => $bonapprovisionnement->getLibelle(),
                'entree' => $entree,
                'sortie' => null,
                'solde' => $solde,
            ];
        }

        return $this->pdfService->exportToPdf($data);
    }
}
