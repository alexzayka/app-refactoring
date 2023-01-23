<?php declare(strict_types=1);

namespace App\Helpers;

class CountryHelper
{
    const EUROPEAN_ISO_CODES = [
        'AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES',
        'FI', 'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU',
        'LV', 'MT', 'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK',
    ];

    public static function isEu(string $code): bool
    {
        return in_array(strtoupper($code), self::EUROPEAN_ISO_CODES);
    }
}
