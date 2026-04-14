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
        Schema::create('t_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('t_users')->cascadeOnDelete();
            $table->enum('status', ['active', 'checked_out'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_carts');
    }
};
