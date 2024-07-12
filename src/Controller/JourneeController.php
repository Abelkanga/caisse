<?php
namespace App\Controller;

use App\Service\JourneeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JourneeController extends AbstractController
{
    private JourneeService $journeeService;

    public function __construct(JourneeService $journeeService)
    {
        $this->journeeService = $journeeService;
    }

    #[Route('/journee/open', name: 'journee_open', methods: ['POST'])]
    public function open(Request $request): Response
    {
        if ($this->isCsrfTokenValid('open_journee', $request->request->get('_token'))) {
            $this->journeeService->openJournee();
        }

        return $this->redirectToRoute('app_welcome');
    }
}
