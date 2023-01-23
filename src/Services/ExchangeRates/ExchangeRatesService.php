<?php declare(strict_types=1);

namespace App\Services\ExchangeRates;

use App\Services\Api\SecuredApi;
use App\Exceptions\RateNotFoundException;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\InvalidStatusException;
use App\DTO\Services\ExchangeRates\ExchangeRatesLatestDTO;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ExchangeRatesService extends SecuredApi implements ExchangeRatesInterface
{
    protected string $baseUri = 'https://api.apilayer.com/exchangerates_data/';

    public function __construct()
    {
        $this->headers = [
            'apikey' => $_ENV['API_LAYER_TOKEN']
        ];

        parent::__construct();
    }

    /**
     * @return array
     * @throws InvalidStatusException
     * @throws GuzzleException
     * @throws UnknownProperties
     */
    public function getRates(): array
    {
        $response = $this->get('latest');

        $data = new ExchangeRatesLatestDTO($response);

        return $data->rates;
    }

    /**
     * @param string $currency
     * @return float
     * @throws GuzzleException
     * @throws InvalidStatusException
     * @throws RateNotFoundException
     * @throws UnknownProperties
     */
    public function getRate(string $currency): float
    {
        $rates = $this->getRates();

        $rate = $rates[strtoupper($currency)];

        if (!$rate) {
            throw new RateNotFoundException($currency);
        }

        return $rate;
    }
}
