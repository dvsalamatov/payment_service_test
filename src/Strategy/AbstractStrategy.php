<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Banks\Contracts\BankInterface;
use App\Entities\Payment;
use App\Strategy\Contracts\StrategyInterface;
use Money\Money;

abstract class AbstractStrategy implements StrategyInterface
{
    protected BankInterface $bank;
    protected Payment $payment;

    public function setBank(BankInterface $bank) : void
    {
        $this->bank = $bank;
    }

    public function createPayment(Money $amount, Money $commission) : void
    {
        $this->payment = new Payment($amount, $commission);
    }
}
