<?php

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
        $sheet->setCellValue('B1', 'Date');
        $sheet->setCellValue('E1', 'Intitulé Caisse');
        $sheet->setCellValue('A1', 'Type');
        $sheet->setCellValue('C1', 'Description');
        $sheet->setCellValue('D1', 'Montant');


        // Fill data
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('B' . $row, $item['date']->format('Y-m-d'));
            $sheet->setCellValue('E' . $row, $item['caisse']);
            $sheet->setCellValue('A' . $row, $item['type']);
            $sheet->setCellValue('C' . $row, $item['description']);
            $sheet->setCellValue('D' . $row, $item['montant']);
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

