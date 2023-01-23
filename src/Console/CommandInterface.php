<?php declare(strict_types=1);

namespace App\Console;

interface CommandInterface
{
    public function handle(): int;
}