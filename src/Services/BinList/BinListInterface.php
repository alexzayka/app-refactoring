<?php declare(strict_types=1);

namespace App\Services\BinList;

use GuzzleHttp\Exception\GuzzleException;
use App\Exceptions\InvalidStatusException;
use App\DTO\Services\BinList\BinInfoInterface;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

interface BinListInterface
{
    public function getInfo(int $bin): BinInfoInterface;
}
