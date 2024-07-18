<?php

// src/Service/PdfService.php

namespace App\Service;

use TCPDF;
use Symfony\Component\HttpFoundation\Response;

class PdfService
{
    public function exportToPdf(array $data): Response
    {
        $pdf = new TCPDF();
        $pdf->AddPage();

        $html = '<h1>État de la Caisse</h1>';
        $html .= '<table border="1" cellpadding="4">
                    <thead>
                        <tr>
                            <th class="text-center">Date</th>
                            <th class="text-center">Nature</th>
                            <th class="text-center">Libellé</th>
                            <th class="text-center">Entrée (F cfa)</th>
                            <th class="text-center">Sortie (F cfa)</th>
                            <th class="text-center">Solde (F cfa)</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $item) {
            $html .= '<tr>
                        <td class="text-center">' . $item['date'] . '</td>
                        <td class="text-center">' . $item['nature'] . '</td>
                        <td class="text-center">' . $item['libelle'] . '</td>
                        <td class="text-center">' . ($item['entree'] !== null ? number_format($item['entree'], 2) : '') . '</td>
                        <td class="text-center">' . ($item['sortie'] !== null ? number_format($item['sortie'], 2) : '') . '</td>
                        <td class="text-center">' . number_format($item['solde'], 2) . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $fileName = 'etat_de_caisse.pdf';
        $pdf->Output($fileName, 'D');

        return new Response();
    }
}
