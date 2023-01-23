<?php declare(strict_types=1);

namespace App\Services\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\InvalidStatusException;

abstract class Api implements ApiInterface
{
    const HTTP_OK = 200;

    protected Client $client;
    protected string $baseUri;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri
        ]);
    }

    /**
     * @param string $endpoint
     * @param array $query
     * @return mixed
     * @throws InvalidStatusException|GuzzleException
     */
    public function get(string $endpoint, array $query = []): mixed
    {
        $response = $this->client->get($endpoint, [
            'query' => $query
        ]);

        $output = $response->getBody()->getContents();

        if ($response->getStatusCode() !== self::HTTP_OK) {
            throw new InvalidStatusException('External service error: ' . $response->getStatusCode());
        }

        return json_decode($output, true);
    }
}
