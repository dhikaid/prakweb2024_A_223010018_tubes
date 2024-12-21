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
            $table->uuid()->unique();
            $table->foreignUuid('booking_uuid')->references('uuid')->on('bookings');
            $table->decimal('total', 15, 2);
            $table->enum('status', ['pending', 'settlement', 'failed'])->default('pending');
            $table->string('method')->nullable();
            $table->string('bank')->nullable();
            $table->string('va')->nullable();
            $table->dateTime('payment_date')->nullable();
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
