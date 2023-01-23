<?php declare(strict_types=1);

namespace Unit;

use App\Helpers\CountryHelper;
use PHPUnit\Framework\TestCase;

class CountryHelperTest extends TestCase
{
    public function testCountryIsEu()
    {
        self::assertTrue(CountryHelper::isEu('DE'));
    }

    public function testCountryIsNonEu()
    {
        self::assertFalse(CountryHelper::isEu('US'));
    }
}
