<?php


namespace App\Controller;

use App\Service\ExportService;
use App\Service\PdfService;
use App\Repository\FdbRepository;
use App\Repository\BonapprovisionnementRepository;
use App\Repository\DepenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExportController extends AbstractController
{
    private $exportService;
    private $pdfService;
    private $fdbRepository;
    private $bonapprovisionnementRepository;
    private $depenseRepository;

    public function __construct(ExportService $exportService, PdfService $pdfService, FdbRepository $fdbRepository, BonapprovisionnementRepository $bonapprovisionnementRepository, DepenseRepository $depenseRepository)
    {
        $this->exportService = $exportService;
        $this->pdfService = $pdfService;
        $this->fdbRepository = $fdbRepository;
        $this->bonapprovisionnementRepository = $bonapprovisionnementRepository;
        $this->depenseRepository = $depenseRepository;
    }
    #[Route('/export/excel', name: 'export_excel', methods:['GET','POST'])]
    public function exportToExcel(): Response
    {
        // Récupérer les données dynamiquement depuis la base de données
        $dateDebut = new \DateTime('2024-06-01'); // Vous pouvez récupérer ces dates dynamiquement
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

        $depenseData = $this->depenseRepository->createQueryBuilder('d')
            ->leftJoin('d.caisse', 'caisse')
            ->addSelect('caisse')
            ->where('d.date BETWEEN :date_debut AND :date_fin')
            ->setParameter('date_debut', $dateDebut)
            ->setParameter('date_fin', $dateFin)
            ->getQuery()
            ->getResult();

        $data = [];

        foreach ($fdbData as $fdb) {
            $data[] = [
                'type' => 'Fiche de besoin',
                'date' => $fdb->getDate(),
                'description' => $fdb->getObjet(),
                'montant' => $fdb->getTotal(),
                'caisse' => $fdb->getCaisse()->getIntitule(),
            ];
        }

        foreach ($bonApprovisionnementData as $bonapprovisionnement) {
            $data[] = [
                'type' => 'Bon Approvisionnement',
                'date' => $bonapprovisionnement->getDate(),
                'description' => $bonapprovisionnement->getNature(),
                'montant' => $bonapprovisionnement->getMontanttotal(),
                'caisse' => $bonapprovisionnement->getCaisse()->getIntitule(),
            ];
        }

        foreach ($depenseData as $depense) {
            $data[] = [
                'type' => 'Depense',
                'date' => $depense->getDate(),
                'description' => $depense->getCategory(),
                'montant' => $depense->getMontant(),
                'caisse' => $depense->getCaisse()->getIntitule(),
            ];
        }

        return $this->exportService->exportToExcel($data);
    }

    #[Route('/export/pdf', name: 'export_pdf', methods:['GET', 'POST'])]
    public function exportToPdf(): Response
    {
        // Récupérer les données dynamiquement depuis la base de données
        $dateDebut = new \DateTime('2024-06-01'); // Vous pouvez récupérer ces dates dynamiquement
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

        $depenseData = $this->depenseRepository->createQueryBuilder('d')
            ->leftJoin('d.caisse', 'caisse')
            ->addSelect('caisse')
            ->where('d.date BETWEEN :date_debut AND :date_fin')
            ->setParameter('date_debut', $dateDebut)
            ->setParameter('date_fin', $dateFin)
            ->getQuery()
            ->getResult();

        $data = [];

        foreach ($fdbData as $fdb) {
            $data[] = [
                'type' => 'Fiche de besoin',
                'date' => $fdb->getDate(),
                'description' => $fdb->getObjet(),
                'montant' => $fdb->getTotal(),
                'caisse' => $fdb->getCaisse()->getIntitule(),
            ];
        }

        foreach ($bonApprovisionnementData as $bonapprovisionnement) {
            $data[] = [
                'type' => 'Bon Approvisionnement',
                'date' => $bonapprovisionnement->getDate(),
                'description' => $bonapprovisionnement->getNature(),
                'montant' => $bonapprovisionnement->getMontanttotal(),
                'caisse' => $bonapprovisionnement->getCaisse()->getIntitule(),
            ];
        }

        foreach ($depenseData as $depense) {
            $data[] = [
                'type' => 'Depense',
                'date' => $depense->getDate(),
                'description' => $depense->getCategory(),
                'montant' => $depense->getMontant(),
                'caisse' => $depense->getCaisse()->getIntitule(),
            ];
        }

        return $this->pdfService->exportToPdf($data);
    }


}
