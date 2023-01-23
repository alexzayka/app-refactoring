<?php declare(strict_types=1);

use App\Console\Input\ArgvInput;
use App\Commands\CalculateTransactionsCommission;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$input = new ArgvInput();

(new CalculateTransactionsCommission($input))->handle();
