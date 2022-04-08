<?php

namespace App\Controller\Import;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

abstract class AstractImportController extends AbstractController
{
    protected $requiredQueryKeys = [];

    protected function validateQueryParameters(array $queryKeys)
    {
        foreach ($this->requiredQueryKeys as $queryKey) {
            if (!in_array($queryKey, $queryKeys)) {
                throw new BadRequestException(sprintf('Missing %s required query key', $queryKey));
            }
        }
    }
}
