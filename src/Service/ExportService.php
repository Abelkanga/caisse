<?php

// src/Service/ExportService.php

// src/Service/ExportService.php

namespace App\Service;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\Response;

class ExportService
{
    public function exportToExcel(array $data): Response
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header values
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Nature');
        $sheet->setCellValue('C1', 'Libellé');
        $sheet->setCellValue('D1', 'Entrée (F cfa)');
        $sheet->setCellValue('E1', 'Sortie (F cfa)');
        $sheet->setCellValue('F1', 'Solde (F cfa)');

        // Fill data
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['date']);
            $sheet->setCellValue('B' . $row, $item['nature']);
            $sheet->setCellValue('C' . $row, $item['libelle']);
            $sheet->setCellValue('D' . $row, $item['entree'] !== null ? number_format($item['entree'], 2) : '');
            $sheet->setCellValue('E' . $row, $item['sortie'] !== null ? number_format($item['sortie'], 2) : '');
            $sheet->setCellValue('F' . $row, number_format($item['solde'], 2));
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'etat_de_caisse.xlsx';

        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        $response = new Response(file_get_contents($temp_file));
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');
        unlink($temp_file);

        return $response;
    }
}
