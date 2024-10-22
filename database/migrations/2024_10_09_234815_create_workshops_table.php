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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('address_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('cnpj')->unique();
            $table->string('razao_social');
            $table->string('descricao_situacao_cadastral');
            $table->string('cnae_fiscal_descricao'); //nome_fantasia
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('responsavel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
