<?php

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('order_no')->unique();
            $table->float('total_amount');
            $table->float('sub_total');
            $table->float('shipping_fee')->default(0.00);
            $table->float('discount')->default(0.00);
            $table->enum('status', OrderStatus::toArray())->default(OrderStatus::Pending);
            $table->enum('payment_status', PaymentStatus::toArray())->default(PaymentStatus::Unpaid);
            $table->enum('payment_method', PaymentMethod::toArray());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
