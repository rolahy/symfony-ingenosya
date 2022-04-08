<?php

namespace App\Controller\Import\User;

use App\Controller\Import\AstractImportController;
use App\Manager\User\UserManager;
use App\Service\Import\User\UsersApiImportService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersImportController extends AstractImportController
{
    public function __construct(private UsersApiImportService $usersApiImportService, private UserManager $userManager)
    {
    }

    #[Route('/api/users/import', name: 'import_users')]
    public function __invoke(Request $request): Response
    {
        try {
            $usersToImport = $this->usersApiImportService->import(http_build_query($request->query->all()));

            $this->userManager->importUsers($usersToImport);

            return $this->json([
                'message' => sprintf('%d users imported', $usersToImport->count()),
                'type' => 'success',
            ]);
        } catch (\Throwable $th) {
            return $this->json([
                'message' => $th->getMessage(),
                'type' => 'error',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
