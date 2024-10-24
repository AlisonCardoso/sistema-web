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
        Schema::create('pivo_orderservices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->integer('duration_hours');  // Duração do serviço em horas
            $table->decimal('hourly_rate', 10, 2);  // Valor por hora
            $table->decimal('total_service_price', 10, 2)->virtualAs('duration_hours * hourly_rate');  // Total calculado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivo_orderservices');
    }
};
