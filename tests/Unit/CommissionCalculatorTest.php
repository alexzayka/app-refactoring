<?php declare(strict_types=1);

namespace Unit;

use App\Services\Commission\CommissionCalculator;
use PHPUnit\Framework\TestCase;

class CommissionCalculatorTest extends TestCase
{
    public function testEuCommission()
    {
        $calculator = new CommissionCalculator(100, 'EUR', true, 1);

        self::assertSame(1.0, $calculator->calculate());
    }

    public function testNonEuCommission()
    {
        $calculator = new CommissionCalculator(100, 'USD', false, 1.09);

        self::assertSame(1.8348623853211006, $calculator->calculate());
    }
}
