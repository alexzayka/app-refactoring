<?php declare(strict_types=1);

namespace App\Services\Commission;

class CommissionCalculator implements CommissionCalculatorInterface
{
    const CURRENCY_EUR = 'EUR';

    const EU_COMMISSION_RATE = .01;
    const NON_EU_COMMISSION_RATE = .02;

    public function __construct(
        private float $amount,
        private string $currency,
        private bool $isEU,
        private float $rate,
    )
    {
    }

    public function calculate(): float
    {
        $fixedAmount = $this->amount;

        if ($this->currency !== self::CURRENCY_EUR && $this->rate !== 0) {
            $fixedAmount = $this->amount / $this->rate;
        }

        return $fixedAmount * ($this->isEU ? self::EU_COMMISSION_RATE : self::NON_EU_COMMISSION_RATE);
    }
}
