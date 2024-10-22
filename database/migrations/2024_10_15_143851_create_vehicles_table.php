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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_command_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_vehicle_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('situation_vehicle_id')->default(1);
            $table->string('brand'); //marca
            $table->string('model');//modelo
            $table->string('prefix')->unique();//prefixo
            $table->boolean('characterized')->default(true);// caracterizada
            $table->string('asset_number')->unique()->nullable(); //numero de patrimonio
            $table->string('odometer')->nullable();
            $table->boolean('active')->default(true);
            $table->string('plate')->unique(); //placa
            $table->year('year'); //ano
            $table->decimal('price', 8, 2);  //preco
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
