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
            $table->uuid()->unique();
            $table->foreignUuid('event_uuid')->references('uuid')->on('events');
            $table->foreignUuid('category_uuid')->references('uuid')->on('event__categories');
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
