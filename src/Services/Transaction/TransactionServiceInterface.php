<?php declare(strict_types=1);

namespace App\Services\Transaction;

use App\DTO\TransactionDTO;

interface TransactionServiceInterface
{
    public function calculateCommission(TransactionDTO $transaction): float;
}
