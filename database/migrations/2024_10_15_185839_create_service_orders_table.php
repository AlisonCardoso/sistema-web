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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete();
            $table->foreignId('situation_id')->constrained('situations')->cascadeOnUpdate();
            $table->date('service_date');
            $table->decimal('labor_hourly_rate', 10, 2)->nullable();  // Valor por hora da mão de obra
            $table->integer('labor_hours')->nullable();  // Duração total da mão de obra em horas
            $table->decimal('labor_total', 10, 2)->virtualAs('labor_hourly_rate * labor_hours')->nullable(); // Valor total calculado
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
