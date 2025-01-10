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
        Schema::create('rifa', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_rifa');
            $table->string('preco_numeros');
            $table->string('premiacao');
            $table->date('data_sorteio');
            $table->unsignedInteger('qtd_num');

            $table->unsignedBigInteger('id_usuario_vencedor')->nullable();
            $table->foreign('id_usuario_vencedor')->references('id')->on('users');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rifa');
    }
};
