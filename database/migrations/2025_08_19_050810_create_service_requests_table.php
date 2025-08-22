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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->string('client_phone');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_center_id')->constrained()->onDelete('cascade');
            $table->foreignId('trade_id')->constrained()->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->string('status')->default('pending'); // pending, in_progress, completed, cancelled
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
