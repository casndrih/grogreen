<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }

    public function createPayment()
    {
        $data = []; // Define the payment details (e.g., total amount, currency, item details, etc.)
        $response = $this->provider->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    }

    public function executePayment(Request $request)
    {
        $response = $this->provider->getExpressCheckoutDetails($request->token);

        if ($response['ACK'] === 'Success') {
            // Payment is successful, handle further logic
        } else {
            // Payment failed, handle error logic
        }
    }
}