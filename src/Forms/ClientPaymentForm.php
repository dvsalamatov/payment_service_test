<?php

declare(strict_types=1);

namespace App\Forms;

use App\Banks\Enum\BanksNames;
use App\PaymentMethods\Enum\PaymentNameEnum;
use DateTime;
use Money\Money;

class ClientPaymentForm
{
    private string $flowName;
    private string $bankName;
    private float $amount;
    private array $params;
    private string $currency;

    public static function createQiwiForm() : self
    {
        $form = new self();
        $form->bankName = BanksNames::SBERBANK;
        $form->flowName = PaymentNameEnum::QIWI;
        $form->currency = 'EUR';
        $form->amount = 305;
        $form->params = [
            'phone' => '+79059808010',
        ];

        return $form;
    }

    public static function createCardForm() : self
    {
        $form = new self();
        $form->bankName = BanksNames::SBERBANK;
        $form->flowName = PaymentNameEnum::CARD;
        $form->currency = 'EUR';
        $form->amount = 305;
        $form->params = [
            'pan' => '4242424242424242',
            'date' => new DateTime('2021-10-15'),
            'cvc' => 123,
        ];

        return $form;
    }

    public function getFlowName() : string
    {
        return $this->flowName;
    }

    public function getBankName() : string
    {
        return $this->bankName;
    }

    public function getAmount() : Money
    {
        $currencyName = $this->currency;

        return Money::$currencyName($this->amount);
    }

    public function getParams() : array
    {
        return $this->params;
    }
}
