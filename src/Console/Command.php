<?php declare(strict_types=1);

namespace App\Console;

use App\Console\Input\InputInterface;

abstract class Command implements CommandInterface
{
    protected InputInterface $input;

    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    public function handle(): int
    {
        return 0;
    }
}