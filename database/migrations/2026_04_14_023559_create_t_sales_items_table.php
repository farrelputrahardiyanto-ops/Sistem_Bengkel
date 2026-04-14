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
        Schema::create('t_sales_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_id')->constrained('t_sales')->cascadeOnDelete();
            $table->foreignId('parts_id')->constrained('t_spareparts');
            $table->integer('qty');
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_sales_items');
    }
};
