<?php declare(strict_types=1);

namespace App\Commands;

use SplFileObject;
use RuntimeException;
use App\Console\Command;
use App\DTO\TransactionDTO;
use App\Services\BinList\BinListService;
use App\Services\Transaction\TransactionService;
use App\Services\ExchangeRates\ExchangeRatesService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CalculateTransactionsCommission extends Command
{
    public function handle(): int
    {
        try {
            $file = new SplFileObject($this->input->getArgument(0));

            while (!$file->eof()) {
                $line = $file->fgets();
                $transaction = new TransactionDTO(json_decode($line, true));

                $transactionService = new TransactionService(new BinListService(), new ExchangeRatesService());

                $commission = $transactionService->calculateCommission($transaction);

                echo round($commission, 2) . PHP_EOL;
            }
        } catch (RuntimeException | UnknownProperties $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        return 0;
    }
}
