<?php
declare(strict_types=1);

namespace App\Strategy\Contracts;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use Money\Money;

interface StrategyInterface
{
    public function instancePaymentMethod(array $params): void;

    public function setBank(BankInterface $bank): void;

    public function createPayment(Money $amount, Money $commission): void;

    public function processPayment(): ProcessedPayment;
}
