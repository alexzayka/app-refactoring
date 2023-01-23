<?php declare(strict_types=1);

namespace App\Console\Input;

class ArgvInput extends Input
{
    public function __construct()
    {
        $argv ??= $_SERVER['argv'] ?? [];
        array_shift($argv);
        $this->arguments = $argv;
    }
}
