<?php declare(strict_types=1);

namespace App\Services\Transaction;

use App\DTO\TransactionDTO;
use App\Services\BinList\BinListInterface;
use App\Services\Commission\CommissionCalculator;
use App\Services\ExchangeRates\ExchangeRatesInterface;

class TransactionService implements TransactionServiceInterface
{
    public function __construct(
        private BinListInterface $binListService,
        private ExchangeRatesInterface $exchangeRatesService,
    )
    {
    }

    /**
     * @param TransactionDTO $transaction
     * @return float
     */
    public function calculateCommission(TransactionDTO $transaction): float
    {
        $bin = $this->binListService->getInfo($transaction->bin);
        $rate = $this->exchangeRatesService->getRate($transaction->currency);

        $calculator = new CommissionCalculator($transaction->amount, $transaction->currency, $bin->isEu(), $rate);

        return $calculator->calculate();
    }
}
