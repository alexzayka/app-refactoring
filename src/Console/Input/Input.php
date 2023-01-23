<?php declare(strict_types=1);

namespace App\Console\Input;

abstract class Input implements InputInterface
{
    protected array $arguments = [];

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function getArgument(int $index): mixed
    {
        return $this->arguments[$index] ?? null;
    }
}
