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
        Schema::create('event__categories__mappings', function (Blueprint $table) {
            $table->id('mapping_id')->unique();
            $table->uuid('mapping_uuid')->unique();
            $table->foreignId('event_id')->references('event_id')->on('events');
            $table->foreignId('category_id')->references('category_id')->on('event__categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event__categories__mappings');
    }
};
