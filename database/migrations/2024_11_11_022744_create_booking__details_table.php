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
            $table->uuid()->unique();
            $table->foreignUuid('booking_uuid')->nullable()->references('uuid')->on('bookings')->nullOnDelete();
            $table->foreignUuid('ticket_uuid')->nullable()->references('uuid')->on('tickets')->nullOnDelete();
            $table->integer('qty');
            $table->decimal('total', 15, 2);
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
