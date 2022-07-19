<?php

declare(strict_types=1);

use App\Forms\ClientPaymentForm;
use App\Services\PaymentService;

require_once './vendor/autoload.php';

/**
 * app.php - это некая ручка "POST /do-payment"
 *
 * С клиента приходит некоторая форма с детализацией платежа: имя flow (card/qiwi/etc), имя банка,
 * детали операции и детали платежного инструмента
 */

//Клиентская форма для Qiwi
$form = ClientPaymentForm::createQiwiForm();

//Либо клиентская форма для карты
//$form = ClientPaymentForm::createCardForm();

$paymentService = new PaymentService();
$response = $paymentService->processPayment($form);


if ($response->isCompleted()) {
    echo 'Thank you! Payment completed';
} elseif ($response->isFailed()) {
    echo 'Something went wrong! Try another card';
}
echo PHP_EOL;
