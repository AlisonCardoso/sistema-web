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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();

            $table->decimal('total_labor', 10, 2);  // Total da mão de obra
            $table->decimal('total_products', 10, 2);  // Total dos produtos
            $table->decimal('total_amount', 10, 2)->virtualAs('total_labor + total_products');  // Valor final
            $table->foreignId('situation_id')->constrained('situations')->cascadeOnUpdate(); // Nova situação
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
