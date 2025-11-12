<?php

namespace App\Services\PaymentServices;

use App\Models\Order;
use Illuminate\Http\Request;

interface PaymentService
{
    public function handle(Order $order): array;

    public function verify(Request $request);
}
