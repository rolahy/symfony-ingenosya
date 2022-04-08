<?php

namespace App\Service\CallAPI;

interface CallApiServiceInterface
{
    public function get(string $url);

    public function delete(string $url);

    public function put(string $url, array $payload);

    public function post(string $url, array $payload);
}
