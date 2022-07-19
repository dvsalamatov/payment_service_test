<?php

declare(strict_types=1);

namespace App\Fee;

use App\Fee\Contracts\FeeCalculatorInterface;
use Money\Money;

class FeeCalculator implements FeeCalculatorInterface
{
    protected Money $amount;
    protected string $flowName;

    public function __construct(Money $amount)
    {
        $this->amount = $amount;
    }

    public function setFlowName(string $flowName) : void
    {
        $this->flowName = $flowName;
    }

    /**
     * Все настройки по комсе хранятся в базе, поэтому один класс на все банки
     * Можно сделать отдельные классы по каждому типу комсы: по банку, по типу платежа и дефолтная комса
     */
    public function calculateCommission() : Money
    {
        return Money::RUB(100);
    }
}
