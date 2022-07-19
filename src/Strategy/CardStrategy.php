<?php
declare(strict_types=1);

namespace App\Strategy;

use App\Banks\Responses\ProcessedPayment;
use App\PaymentMethods\Card;

class CardStrategy extends AbstractStrategy
{
    protected Card $card;

    public function instancePaymentMethod(array $params): void
    {
        $this->card = new Card($params['pan'], $params['date'], $params['cvc']);
    }

    public function processPayment(): ProcessedPayment
    {
        return $this->bank->processCardPayment($this->payment->getAmount(), $this->card);
    }
}
