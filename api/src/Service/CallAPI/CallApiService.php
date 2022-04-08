<?php

namespace App\Service\CallAPI;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService implements CallApiServiceInterface
{
    public function __construct(private HttpClientInterface $client)
    {
    }

    public function get(string $url): array
    {
        try {
            $response = $this->client->request(
                Request::METHOD_GET,
                $url
            );

            return $response->toArray();
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage(), $th->getCode());
        }
    }

    public function delete(string $url)
    {
        // DELETE Logics
    }

    public function post(string $url, array $payload)
    {
        // POST Logics
    }

    public function put(string $url, array $payload)
    {
        // PUT Logics
    }
}
