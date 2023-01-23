<?php declare(strict_types=1);

namespace App\Services\Commission;

interface CommissionCalculatorInterface
{
    public function calculate(): float;
}
