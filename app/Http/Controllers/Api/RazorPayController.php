<?php

namespace App\Http\Controllers\Api;

use App\Dto\Order\OrderItemDto;
use App\Enums\Order\OrderStatus;
use App\Enums\Payment\PaymentMethod;
use App\Enums\Payment\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Services\OrderService;
use App\Services\PaymentServices\RazorPayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RazorPayController extends Controller
{
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
        $orderDto = new OrderItemDto(
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

            $order = new OrderService(new RazorPayService)->createOrderFromCart($cart, $orderDto);

            return response()->json([
                'razorPayOrder' => $order,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in RazorPayController@create', [
                $e->getMessage(),
                $e->getTraceAsString(),
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

            if (! app(RazorPayService::class)->verify($request)) {
                session()->put('paymentStaus', 'failed');

                return response()->json([
                    'message' => 'Payment verification failed',
                ], 400);
            }

            // update the order status
            $order = Order::where('id', $request->receipt)->first();
            if (! $order) {
                throw new \Exception('Order not found for receipt'.$request->receipt);
            }

            $order->payment_status = PaymentStatus::Paid->value;
            $order->save();

            Log::info('Payment Verified and Order Updated', [
                'order_id' => $order->id,
                'payment_status' => $order->payment_status,
            ]);

            session()->put('paymentStatus', 'success');

            return response()->json([
                'success' => 'Payment successful',
            ]);
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
