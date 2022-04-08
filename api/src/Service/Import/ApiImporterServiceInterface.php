<?php

namespace App\Service\Import;

interface ApiImporterServiceInterface
{
    public function import(string $queryString);
}
