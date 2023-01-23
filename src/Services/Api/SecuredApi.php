<?php declare(strict_types=1);

namespace App\Services\Api;

use GuzzleHttp\Client;

abstract class SecuredApi extends Api
{
    protected array $headers = [];

    public function __construct()
    {
        parent::__construct();

        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'headers' => $this->headers
        ]);
    }
}
