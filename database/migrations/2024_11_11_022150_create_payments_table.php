<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id')->unique();
            $table->uuid('payment_uuid')->unique();
            $table->foreignId('booking_id')->references('booking_id')->on('bookings');
            $table->decimal('jumlah_pembayaran');
            $table->string('payment_method');
            $table->enum('status_payment', ['pending', 'in_progress', 'completed']);
            $table->dateTime('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
