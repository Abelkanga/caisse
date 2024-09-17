<?php

namespace App\Service;

use Mpdf\Mpdf;

class PdfService
{
    private Mpdf $pdf;

    public function __construct()
    {
        $this->pdf = new Mpdf();
    }

    public function generatePdf(string $html): string
    {
        // Charger le contenu HTML dans mpdf
        $this->pdf->WriteHTML($html);

        // Générer le contenu du PDF en mémoire et retourner le fichier
        return $this->pdf->Output('', 'S');
    }
}
