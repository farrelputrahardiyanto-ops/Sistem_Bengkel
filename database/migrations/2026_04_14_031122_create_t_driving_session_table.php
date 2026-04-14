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
        Schema::create('t_driving_session', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user_package')->constrained('t_user_driving_packages');
            $table->integer('used_hours');
            $table->dateTime('session_date');
            $table->enum('status', ['scheduled', 'completed', 'cancelled']);
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_driving_session');
    }
};
