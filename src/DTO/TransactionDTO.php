<?php declare(strict_types=1);

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class TransactionDTO extends DataTransferObject
{
    public int $bin;
    public float $amount;
    public string $currency;
}
