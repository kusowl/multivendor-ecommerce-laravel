<?php

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
        Schema::table('orders', function (Blueprint $table) {
            $table->date('confirmed_at')->nullable();
            $table->date('shipped_at')->nullable();
            $table->date('delivered_at')->nullable();
            $table->date('cancelled_at')->nullable();
            $table->date('returned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('confirmed_at');
            $table->dropColumn('shipped_at');
            $table->dropColumn('delivered_at');
            $table->dropColumn('cancelled_at');
            $table->dropColumn('returned_at');
        });
    }
};
