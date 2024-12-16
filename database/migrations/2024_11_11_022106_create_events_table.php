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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid()->unique();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->foreignUuid('location_uuid')->references('uuid')->on('locations');
            $table->foreignUuid('user_uuid')->references('uuid')->on('users');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('capacity');
            $table->boolean('is_tiket_war')->default(false);
            $table->integer('queue_limit')->nullable();
            $table->dateTime('queue_open')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
