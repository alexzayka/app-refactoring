<?php declare(strict_types=1);

namespace Feature;

use App\DTO\TransactionDTO;
use PHPUnit\Framework\TestCase;
use App\Services\BinList\BinListService;
use App\DTO\Services\BinList\BinListDTO;
use App\Services\Transaction\TransactionService;
use App\Services\ExchangeRates\ExchangeRatesService;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class TransactionServiceTest extends TestCase
{
    private BinListService $binListService;
    private ExchangeRatesService $exchangeRatesService;

    /**
     * @dataProvider validDataProvider
     * @param $data
     * @throws UnknownProperties
     */
    public function testGetCommissionWithValidData($data): void
    {
        $this->prepareMock($data);

        $transactionService = new TransactionService($this->binListService, $this->exchangeRatesService);
        $transaction = new TransactionDTO($data['transaction']);

        $result = $transactionService->calculateCommission($transaction);

        $this->assertSame($data['expected'], $result);
    }

    public function validDataProvider(): array
    {
        return [
            [[
                'iso' => 'DK',
                'rate' => 1.0,
                'transaction' => ['bin' => 45717360, 'amount' => 100.0, 'currency' => 'EUR'],
                'expected' => 1.0
            ]],
            [[
                'iso' => 'LT',
                'rate' => 1.1,
                'transaction' => ['bin' => 516793, 'amount' => 50.0, 'currency' => 'USD'],
                'expected' => 0.45454545454545453
            ]],
            [[
                'iso' => 'US',
                'rate' => 1.1,
                'transaction' => ['bin' => 41417360, 'amount' => 130.0, 'currency' => 'USD'],
                'expected' => 2.3636363636363633
            ]],
        ];
    }

    /**
     * @param $data
     * @throws UnknownProperties
     */
    private function prepareMock($data): void
    {
        $this->binListService = $this->createMock(BinListService::class);
        $this->binListService->method('getInfo')->willReturn(new BinListDTO(['country' => ['alpha2' => $data['iso']]]));

        $this->exchangeRatesService = $this->createMock(ExchangeRatesService::class);
        $this->exchangeRatesService->method('getRate')->willReturn($data['rate']);
    }
}
