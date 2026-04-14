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
        Schema::create('t_car_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('t_car_brand')->cascadeOnDelete();
            $table->string('name', 100);
            $table->enum('transmission', ['manual', 'matic']);
            $table->boolean('is_tutor_car')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_car_models');
    }
};
