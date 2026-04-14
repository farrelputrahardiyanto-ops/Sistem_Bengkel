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
        Schema::create('t_spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('img');
            $table->string('brand_sparepart');
            $table->string('brand_car');
            $table->string('car_type');
            $table->string('part_code');
            $table->decimal('price');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_spareparts');
    }
};
