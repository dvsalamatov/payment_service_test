<?php
declare(strict_types=1);

namespace App\Strategy;

use App\Banks\Contracts\BankInterface;
use App\Banks\Responses\ProcessedPayment;
use App\Entities\Payment;
use App\PaymentMethods\Qiwi;
use App\Strategy\Contracts\StrategyInterface;
use Money\Money;

class QiwiStrategy extends AbstractStrategy
{
    protected Qiwi $qiwi;

    public function instancePaymentMethod(array $params): void
    {
        $this->qiwi = new Qiwi($params['phone']);
    }

    public function processPayment(): ProcessedPayment
    {
        return $this->bank->processQiwiPayment($this->payment->getAmount(), $this->qiwi);
    }
}
