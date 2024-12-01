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
        Schema::create('queues', function (Blueprint $table) {
            $table->id('queue_id')->unique();
            $table->uuid('queue_uuid')->unique();
            $table->foreignId('event_id')->references('event_id')->on('events');
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->dateTime('queue_time');
            $table->enum('queue_status', ['pending', 'in_progress', 'completed']); // Menggunakan enum dengan pilihan status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
