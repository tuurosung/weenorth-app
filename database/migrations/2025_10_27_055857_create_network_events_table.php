<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('network_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_id');
            $table->string('title');
            $table->string('event_type')->default('event');
            $table->text('description');
            $table->date('date');
            $table->string('time');
            $table->string('location');
            $table->string('created_by_id');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('network_events');
    }
};
