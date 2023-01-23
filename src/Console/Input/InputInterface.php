<?php declare(strict_types=1);

namespace App\Console\Input;

interface InputInterface
{
    public function getArguments(): array;

    public function getArgument(int $index): mixed;
}