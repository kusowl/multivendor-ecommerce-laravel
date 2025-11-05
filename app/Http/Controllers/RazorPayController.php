<?php

namespace App\Http\Controllers;

use App\Dto\Order\OrderDto;
use App\Enums\Order\OrderStatus;
use App\Enums\Payment\PaymentMethod;
use App\Enums\Payment\PaymentStatus;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class RazorPayController extends Controller
{
    protected Api $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(config('razorpay.razorpay_key'), config('razorpay.razorpay_secret'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cart $cart)
    {
        $cartPrices = $cart->getPrices();
        $orderDto = new OrderDto(
            userId: $cart->customer->id ?? Auth::user()->id,
            orderNo: $cart->id,
            totalAmount: $cartPrices->total,
            subTotal: $cartPrices->subTotal,
            shippingFee: $cartPrices->fees,
            discount: $cartPrices->discount,
            status: OrderStatus::Pending,
            paymentStatus: PaymentStatus::Unpaid,
            paymentMethod: PaymentMethod::RazorPay
        );
        try {
            Log::info('Creating Order in RazorPayController', [
                'user_id' => $orderDto->userId,
                'cart_id' => $orderDto->orderNo,
                'amount' => $orderDto->totalAmount,
            ]);
            $order = DB::transaction(function () use ($cart, $orderDto) {
                $order = Order::create($orderDto->toModelArray());
                $cart->delete();

                return $order;
            });
            $amount = $cartPrices->total;

            if (! $order) {
                throw new \Exception('Order Creation failed');
            }

            $receipt = (string) $order->id;
            $amount *= 100;
            $currency = 'INR';
            $razorPayOrder = $this->razorpay->order->create(compact('receipt', 'amount', 'currency'))->toArray();
            Log::info('RazorPay order created', [
                'razorpay_order_id' => $razorPayOrder['id'] ?? null,
                'order_id' => $order->id,
            ]);

            return response()->json([
                'razorPayOrder' => $razorPayOrder,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in RazorPayController@create', [
                $e->getTraceAsString(),
                $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Something gone wrong',
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function verify(Request $request)
    {
        try {
            Log::info('Verifying RazorPayOrder', [
                'razorpay_order_id' => $request->input('razorpay_order_id'),
                'razorpay_payment_id' => $request->input('razorpay_payment_id'),

            ]);
            $this->razorpay->utility->verifyPaymentSignature($request->only([
                'razorpay_order_id', 'razorpay_payment_id', 'razorpay_signature',
            ]));

            // If no exception is occurred then payment is successfully.
            // update the order status
            $order = Order::where('id', $request->receipt)->first();
            if (! $order) {
                throw new \Exception('Order not found for receipt'.$request->receipt);
            }
            $order->payment_status = PaymentStatus::Paid;
            $order->save();

            Log::info('Payment Verified and Order Updated', [
                'order_id' => $order->id,
                'payment_status' => $order->payment_status,
            ]);

            session()->put('paymentStatus', 'success');

            return response()->json([
                'success' => 'Payment successful',
            ]);
        } catch (signatureverificationerror $e) {
            Log::warning('Razorpay Payment Signature verification failed', [
                'error' => $e->getMessage(),
                'request' => $request->all(),
            ]);
            session()->put('paymentStaus', 'failed');

            return response()->json([
                'error' => 'Payment verification failed',
                'message' => $e->getMessage(),
            ], 400);
        } catch (\Exception $e) {
            Log::error('Error in RazorPayController@verify', [
                $e->getMessage(),
                $e->getTraceAsString(),
            ]);
            session()->put('paymentStaus', 'unknown');

            return response()->json([
                'error' => 'Something gone wrong',
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
