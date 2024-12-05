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
            $table->id('event_id')->unique();
            $table->string('slug')->unique();
            $table->string('event_name');
            $table->string('image');
            $table->text('description');
            $table->foreignId('location')->references('location_id')->on('locations');
            $table->foreignId('user')->references('user_id')->on('users');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('capacity');
            $table->boolean('is_tiket_war');
            $table->integer('queue_limit')->nullable();
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
