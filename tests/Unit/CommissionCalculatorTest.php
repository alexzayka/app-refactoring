<?php


use App\Services\Commission\CommissionCalculator;
use PHPUnit\Framework\TestCase;

class CommissionCalculatorTest extends TestCase
{
    public function testEuCommission()
    {
        $calculator = new CommissionCalculator(100, 1, true, 'EUR');

        self::assertSame(1.0, $calculator->calculate());
    }

    public function testNonEuCommission()
    {
        $calculator = new CommissionCalculator(100, 1, false, 'USD');

        self::assertSame(2.0, $calculator->calculate());
    }
}