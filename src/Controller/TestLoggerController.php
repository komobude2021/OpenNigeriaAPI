<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class TestLoggerController extends AbstractController
{
    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly LoggerInterface $infoHandlerLogger,
    ) {
    }

    #[Route('/test/logger', name: 'app_test_logger')]
    public function index(): JsonResponse
    {
        $this->infoHandlerLogger->info('Successfully Requested API Endpoint',
            [
                'info' => __METHOD__,
            ]
        );
        $this->logger->error('Error Requested API Endpoint',
            [
                'error' => __METHOD__,
            ]
        );

        return $this->json(
            [
                'test' => 'completed',
            ]
        );
    }
}
