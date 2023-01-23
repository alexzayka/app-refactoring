<?php declare(strict_types=1);

namespace App\DTO\Services\ExchangeRates;

use Spatie\DataTransferObject\DataTransferObject;

class ExchangeRatesLatestDTO extends DataTransferObject
{
    public array $rates = [];
}
