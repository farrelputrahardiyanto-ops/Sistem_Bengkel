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
        Schema::create('t_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('t_users');
            $table->foreignId('car_id')->constrained('t_service_cars');
            $table->foreignId('sales_id')->constrained('t_sales')->default(NULL);
            $table->text('services_description');
            $table->dateTime('time_reservation');
            $table->enum('status', ['pending', 'on_progress', 'done', 'cancelled']);
            $table->decimal('service_price');
            $table->decimal('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_services');
    }
};
