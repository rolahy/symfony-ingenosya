<?php

namespace App\Service\Import\User;

use App\Factory\User\UserFactory;
use App\Service\CallAPI\CallApiServiceInterface;
use App\Service\Import\AbstractApiImporterService;
use Doctrine\Common\Collections\ArrayCollection;

class UsersApiImportService extends AbstractApiImporterService
{
    public function __construct(CallApiServiceInterface $callApiService, private string $usersApiEndpoint)
    {
        parent::__construct($callApiService);
    }

    public function import(string $queryString): ArrayCollection
    {
        $userItems = ($this
            ->callApiService
            ->get($this->usersApiEndpoint.'/?'.$queryString))['results']
        ;

        $results = new ArrayCollection();

        foreach ($userItems as $item) {
            $results->add(UserFactory::createFromExternalAPI($item));
        }

        return $results;
    }
}
