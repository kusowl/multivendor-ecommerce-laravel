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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('description');
            $table->float('price');
            $table->boolean('is_active')->default(true);
            $table->integer('stock');

            $table->foreignIdFor(\App\Models\Category::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignIdFor(\App\Models\SubCategory::class)
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignIdFor(\App\Models\User::class, 'vendor_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
