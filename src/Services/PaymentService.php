<?php
declare(strict_types=1);

namespace App\Services;

use App\Banks\BankFactory;
use App\Banks\Responses\ProcessedPayment;
use App\Fee\FeeCalculator;
use App\Forms\ClientPaymentForm;
use App\Services\Contracts\PaymentServiceInterface;
use App\Strategy\StrategyFactory;

class PaymentService implements PaymentServiceInterface
{
    public function processPayment(ClientPaymentForm $form): ProcessedPayment
    {
        $bank = BankFactory::create($form->getBankName());

        $strategy = StrategyFactory::create($form->getFlowName());
        $strategy->instancePaymentMethod($form->getParams());
        $strategy->setBank($bank);

        $feeCalculator = new FeeCalculator($form->getAmount());
        $feeCalculator->setFlowName($form->getFlowName());

        $strategy->createPayment($form->getAmount(), $feeCalculator->calculateCommission());

        return $strategy->processPayment();
    }
}
