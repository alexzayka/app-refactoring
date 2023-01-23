<?php declare(strict_types=1);

namespace App\Services\Api;

interface ApiInterface
{
    public function get(string $endpoint, array $query = []): mixed;
}
