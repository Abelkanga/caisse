<?php

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
                            <th class="text-center">Intitulé Caisse</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Montant</th>
                            
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $item) {
            $html .= '<tr>
                        <td class="text-center">' . $item['date']->format('Y-m-d') . '</td>
                          <td class="text">' . $item['caisse'] . '</td>
                        <td class="text">' . $item['type'] . '</td>
                        <td class="text">' . $item['description'] . '</td>
                        <td class="text">' . $item['montant'] . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $fileName = 'etat_de_caisse.pdf';
        $pdf->Output($fileName, 'D');

        return new Response();
    }
}
