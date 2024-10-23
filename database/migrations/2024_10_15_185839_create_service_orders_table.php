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
            $table->foreignId('workshop_id')->constrained()->cascadeOnDelete(); // Oficina associada
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('situation_id')->constrained('situations')->cascadeOnUpdate(); // Situação da ordem de serviço
            $table->date('service_date');
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete(); 
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
