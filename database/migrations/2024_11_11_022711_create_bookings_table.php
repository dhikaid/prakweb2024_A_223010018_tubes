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
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid()->unique();
            $table->foreignUuid('user_uuid')->nullable()->references('uuid')->on('users')->nullOnDelete();
            $table->foreignUuid('event_uuid')->nullable()->references('uuid')->on('events')->nullOnDelete();
            $table->enum('status', ['pending', 'settlement', 'failed'])->default('pending');
            $table->boolean('sendEmail')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
