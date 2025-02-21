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
            $table->string('titulo_rifa')->nullable();
            $table->string('preco_numeros')->nullable();
            $table->string('premiacao')->nullable();
            $table->date('data_sorteio')->nullable();
            $table->unsignedInteger('qtd_num')->nullable();
            $table->string('imagem')->nullable();

            $table->unsignedBigInteger('id_usuario_vencedor')->nullable();
            $table->foreign('id_usuario_vencedor')->references('id')->on('usuarios');

            $table->unsignedBigInteger('id_instituicao')->nullable();
            $table->foreign('id_instituicao')->references('id')->on('instituicao');

            $table->timestamps();
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
