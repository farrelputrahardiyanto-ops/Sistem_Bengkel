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
        Schema::create('t_user_driving_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('t_users');
            $table->foreignId('package_id')->constrained('t_driving_packages');
            $table->foreignId('car_id')->constrained('t_car_models');
            $table->foreignId('instructor_id')->constrained('t_users');
            $table->integer('remaining_hours');
            $table->enum('status', ['active', 'completed'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_user_driving_packages');
    }
};
