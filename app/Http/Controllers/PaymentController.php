<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePaymentRequest;
use Mollie\Laravel\Facades\Mollie;


class PaymentController extends Controller
{
    public function createCheckout(CreatePaymentRequest $request)
    {
        $request->validated();


        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00" // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => $request->callback . "?order_id=12345",
            "webhookUrl" => route('checkout.webhooks'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Checkout created',
            'checkoutUrl' => $payment->getCheckoutUrl(),
        ]);
    }



    public function handleWebhookNotification(Request $request)
    {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid())
        {
            echo 'Payment received.';
            // Do your thing ...
        }
    }

}
