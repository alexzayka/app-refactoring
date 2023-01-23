<?php declare(strict_types=1);

namespace App\DTO\Services\BinList;

use App\Helpers\CountryHelper;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class BinListDTO extends DataTransferObject implements BinInfoInterface
{
    #[MapFrom('country.alpha2')]
    public string $countryCode;

    public function isEu(): bool
    {
        return CountryHelper::isEu($this->countryCode);
    }
}
