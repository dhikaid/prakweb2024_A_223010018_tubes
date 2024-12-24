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
            $table->uuid()->unique();
            $table->foreignUuid('event_uuid')->nullable()->references('uuid')->on('events')->nullOnDelete();
            $table->foreignUuid('user_uuid')->nullable()->references('uuid')->on('users')->nullOnDelete();
            $table->dateTime('joined_at')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed']); // Menggunakan enum dengan pilihan status
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
