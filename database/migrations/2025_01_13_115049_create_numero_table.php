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
        Schema::create('numero', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('descricao');
            $table->boolean('comprado');

            $table->bigInteger('comprador')->nullable();
            $table->foreign('comprador')->references('id')->on('usuarios');

            $table->unsignedBigInteger('id_rifa');
            $table->foreign('id_rifa')->references('id')->on('rifa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numero');
    }
};
