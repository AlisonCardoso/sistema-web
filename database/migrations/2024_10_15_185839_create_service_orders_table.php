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
            $table->foreignId('budget_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete(); // Oficina associada
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->date('service_date'); // Data do serviço
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete(); // Produto opcional
            $table->string('status')->default('open'); // Ex: open, in_progress, completed
            $table->timestamp('start_date')->nullable(); // Data de início
            $table->timestamp('end_date')->nullable(); // Data de término
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
