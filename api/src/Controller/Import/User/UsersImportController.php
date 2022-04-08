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
    public const SEED_KEY = 'seed';
    public const NAT_KEY = 'nat';
    public const COUNTRY_KEY = 'country';
    public const COUNT_KEY = 'count';
    public const RESULTS_KEY = 'results';

    protected $requiredQueryKeys = [
        self::SEED_KEY, self::COUNTRY_KEY, self::COUNT_KEY,
    ];

    public function __construct(private UsersApiImportService $usersApiImportService, private UserManager $userManager)
    {
    }

    #[Route('/api/users/import', name: 'import_users')]
    public function __invoke(Request $request): Response
    {
        try {
            $queries = $request->query->all();

            $this->validateQueryParameters(array_keys($queries));

            $usersToImport = $this->usersApiImportService->import(
                http_build_query($this->getTransformedQueries($queries))
            );

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

    private function getTransformedQueries(array $queries): array
    {
        return [
            self::SEED_KEY => $queries[self::SEED_KEY],
            self::NAT_KEY => $queries[self::COUNTRY_KEY],
            self::RESULTS_KEY => $queries[self::COUNT_KEY],
       ];
    }
}
