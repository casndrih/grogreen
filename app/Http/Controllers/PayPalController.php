<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;

class PayPalController extends Controller
{
    /**
     * Build a configured PayPal service instance on demand.
     *
     * Credentials are read from config/paypal.php (populated from .env).
     * The instance is created per-request so the app can boot without
     * live PayPal credentials configured.
     */
    protected function paypal(): PayPal
    {
        $provider = new PayPal;
        $provider->setApiCredentials(config('paypal'));

        return $provider;
    }

    /**
     * Create a PayPal order and redirect the buyer to approve it.
     */
    public function createPayment(Request $request)
    {
        $provider = $this->paypal();
        $provider->getAccessToken();

        $order = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paypal.currency', 'USD'),
                        'value' => (string) $request->input('amount', 0),
                    ],
                ],
            ],
            'application_context' => [
                'return_url' => route('paypal.execute'),
                'cancel_url' => route('cart.index'),
            ],
        ];

        $response = $provider->createOrder($order);

        if (isset($response['id']) && $response['id']) {
            $approveLink = collect($response['links'])
                ->firstWhere('rel', 'approve');

            return redirect($approveLink['href'] ?? route('cart.index'));
        }

        return redirect()->route('cart.index')
            ->with('error', 'Unable to initiate PayPal payment.');
    }

    /**
     * Capture the approved PayPal order after the buyer is redirected back.
     */
    public function executePayment(Request $request)
    {
        $orderId = $request->query('token');

        if (! $orderId) {
            return redirect()->route('cart.index')
                ->with('error', 'Missing PayPal order token.');
        }

        $provider = $this->paypal();
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($orderId);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            // TODO: mark the local order as paid.
            return redirect()->route('orders.index')
                ->with('success', 'Payment completed successfully.');
        }

        return redirect()->route('cart.index')
            ->with('error', 'Payment was not completed.');
    }
}
