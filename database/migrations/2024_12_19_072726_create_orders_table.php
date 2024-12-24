<?php

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\ProductItem;
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
            $table->string('order_number')->unique();
            $table->foreignIdFor(Customer::class)->constrained()->cascadeOnDelete();
            $table->string('dentist');
            $table->string('patient');
            $table->foreignIdFor(ProductItem::class)->constrained()->cascadeOnDelete();
            $table->boolean('digital')->default(false);
            $table->string('status')->default(OrderStatus::CREATED);
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
