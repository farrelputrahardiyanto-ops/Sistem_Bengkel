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
        Schema::create('t_driving_packages', function (Blueprint $table) {
            $table->id();
            $table->enum('transmission_type', ['manual', 'matic']);
            $table->enum('ac_type', ['ac', 'non_ac']);
            $table->integer('total_hours');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_driving_packages');
    }
};
