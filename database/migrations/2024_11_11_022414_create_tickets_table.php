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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id')->unique();
            $table->uuid('ticket_uuid')->unique();
            $table->string('jenis_ticket');
            $table->decimal('ticket_price', 15, 2);
            $table->integer('jumlah_ticket');
            $table->foreignId('event_id')->references('event_id')->on('events');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
