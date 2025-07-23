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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_id', 20)->unique();
            $table->string('cohort', 25)->nullable();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique()->nullable();
            $table->string('phone', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            // Address Information
            $table->text('address')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();

            // Professional Information
            $table->unsignedBigInteger('trade_id')->nullable();
            $table->unsignedInteger('experience_years')->nullable();
            $table->enum('skill_level', ['beginner', 'intermediate', 'advanced', 'expert'])->nullable();

            // Membership Information
            $table->enum('membership_type', ['individual', 'corporate', 'student'])->default('individual');
            $table->enum('membership_status', ['active', 'inactive', 'suspended', 'pending'])->default('pending');
            $table->date('joined_date');

            // Additional Information
            $table->string('profile_photo')->nullable();
            $table->text('bio')->nullable();
            $table->json('certification_documents')->nullable();

            // Status and Timestamps
            $table->boolean('is_verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('trade_id')->references('id')->on('trades')->onDelete('set null');

            // Indexes
            $table->index('member_id');
            $table->index('email');
            $table->index('membership_status');
            $table->index(['region_id', 'district_id']);
            $table->index('trade_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
