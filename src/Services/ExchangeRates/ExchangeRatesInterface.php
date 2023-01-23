<?php declare(strict_types=1);

namespace App\Services\ExchangeRates;

use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\RateNotFoundException;
use App\Exceptions\InvalidStatusException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

interface ExchangeRatesInterface
{
    public function getRates(): array;

    public function getRate(string $currency): float;
}
