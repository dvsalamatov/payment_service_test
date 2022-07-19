<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Banks\Responses\ProcessedPayment;
use App\Forms\ClientPaymentForm;

interface PaymentServiceInterface
{
    public function processPayment(ClientPaymentForm $form) : ProcessedPayment;
}
