<?php

// src/Controller/MailController.php

namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    private EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    #[Route('/send-email', name: 'send_email')]
    public function sendEmail(): Response
    {
        $this->emailService->sendEmail(
            'recipient@example.com',
            'Sujet de l\'email',
            'Contenu de l\'email'
        );

        return new Response('Email envoyé avec succès!');
    }
}
