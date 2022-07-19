<?php

declare(strict_types=1);

namespace App\Strategy;

use App\PaymentMethods\Enum\PaymentNameEnum;
use App\Strategy\Contracts\StrategyInterface;
use Exception;

class StrategyFactory
{
    /**
     * @throws Exception
     */
    public static function create(string $paymentFlowName) : StrategyInterface
    {
        switch ($paymentFlowName) {
            case PaymentNameEnum::CARD:
                $strategy = new CardStrategy();
                break;
            case PaymentNameEnum::QIWI:
                $strategy = new QiwiStrategy();
                break;
            default:
                //TODO выкидывать специальный exception место общего
                throw new Exception('Wrong flow name');
        }

        return $strategy;
    }
}
