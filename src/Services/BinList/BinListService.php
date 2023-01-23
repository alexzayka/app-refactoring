<?php declare(strict_types=1);

namespace App\Services\BinList;

use App\Services\Api\Api;
use App\DTO\Services\BinList\BinListDTO;
use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\InvalidStatusException;
use App\DTO\Services\BinList\BinInfoInterface;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class BinListService extends Api implements BinListInterface
{
    protected string $baseUri = 'https://lookup.binlist.net/';

    /**
     * @param int $bin
     * @return BinListDTO
     * @throws InvalidStatusException
     * @throws GuzzleException
     * @throws UnknownProperties
     */
    public function getInfo(int $bin): BinInfoInterface
    {
        $response = $this->get((string)$bin);

        return new BinListDTO($response);
    }
}
