<?php

namespace App\Service\Import;

use App\Service\CallAPI\CallApiServiceInterface;

abstract class AbstractApiImporterService implements ApiImporterServiceInterface
{
    protected CallApiServiceInterface $callApiService;

    public function __construct(CallApiServiceInterface $callApiService)
    {
        $this->callApiService = $callApiService;
    }
}
