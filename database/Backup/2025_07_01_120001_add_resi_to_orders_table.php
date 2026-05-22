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
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);
            $table->text('shipping_address');
            $table->string('payment_method', 100);
            $table->string('status', 50)->default('waiting_payment');
            $table->timestamp('payment_due_at')->nullable();
            $table->string('payment_token')->nullable();
            $table->string('courier', 50)->nullable();
            $table->boolean('return_requested')->default(false);
            $table->string('resi')->nullable();
            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->decimal('subtotal', 12, 2);
            $table->decimal('shipping_cost', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);
            $table->text('shipping_address');
            $table->string('payment_method', 100);
            $table->string('status', 50)->default('waiting_payment');
            $table->timestamp('payment_due_at')->nullable();
            $table->string('payment_token')->nullable();
            $table->string('courier', 50)->nullable();
            $table->boolean('return_requested')->default(false);
            $table->string('resi')->nullable();
            $table->timestamps();
            
        });
    }
}; 