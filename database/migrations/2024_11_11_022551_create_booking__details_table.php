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
        Schema::create('booking__details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->uuid('detail_uuid');
            $table->foreignId('booking_id')->references('booking_id')->on('bookings');
            $table->foreignId('ticket_id')->references('ticket_id')->on('tickets');
            $table->integer('jumlah_pesan_ticket');
            $table->decimal('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking__details');
    }
};
