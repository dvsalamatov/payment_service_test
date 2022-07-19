<?php

declare(strict_types=1);

namespace App\Strategy;

use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\Qiwi;

class QiwiStrategy extends AbstractStrategy
{
    protected Qiwi $qiwi;

    public function instancePaymentMethod(array $params) : void
    {
        $this->qiwi = new Qiwi($params['phone']);
    }

    public function processPayment() : ProcessedPayment
    {
        return $this->bank->processQiwiPayment($this->payment->getAmount(), $this->qiwi);
    }
}
