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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code_order')->default('DH');
            $table->string('email');
            $table->integer('user_id');
            $table->string('address');
            $table->string('phone');
            $table->string('price');
            $table->string('note');
            $table->string('payment_type');
            $table->string('total_payment');
            $table->softDeletes();
            $table->integer('status');
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
