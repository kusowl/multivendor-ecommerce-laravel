<?php

namespace App\Services\PaymentServices;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazorPayService implements PaymentService
{
    protected Api $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(config('razorpay.razorpay_key'), config('razorpay.razorpay_secret'));
    }

    /** @throws  Exception*/
    public function handle(Order $order): array
    {
        $currency = 'INR';
        $razorPayOrder = $this->razorpay->order->create([
            'receipt' => (string) $order->id,
            'amount' => $order->total_amount * 100,
            'currency' => $currency,
        ])->toArray();

        Log::info('RazorPay order created', [
            'razorpay_order_id' => $razorPayOrder['id'] ?? null,
            'order_id' => $order->id,
        ]);

        return $razorPayOrder;
    }

    public function verify(Request $request): bool
    {
        try {

            Log::info('Verifying RazorPayOrder', [
                'razorpay_order_id' => $request->input('razorpay_order_id'),
                'razorpay_payment_id' => $request->input('razorpay_payment_id'),

            ]);
            $this->razorpay->utility->verifyPaymentSignature($request->only([
                'razorpay_order_id', 'razorpay_payment_id', 'razorpay_signature',
            ]));

            return true;
        } catch (SignatureVerificationError $e) {
            Log::error('RazorPay signature verification mismatch', [
                $e->getMessage(),
                $e->getLine(),
                $e->getTraceAsString(),
            ]);

            return false;
        }

    }
}
