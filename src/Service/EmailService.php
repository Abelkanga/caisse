<?php

// src/Service/EmailService.php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(string $to, string $subject, string $body): void
    {
        $email = (new Email())
            ->from('your_email@example.com')
            ->to($to)
            ->subject($subject)
            ->text($body)
            ->html('<p>' . $body . '</p>');

        $this->mailer->send($email);
    }

}
