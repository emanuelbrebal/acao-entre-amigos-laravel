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
        Schema::table('instituicao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rifa')->nullable();
            $table->foreign('id_rifa')->references('id')->on('rifa')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instituicao', function (Blueprint $table) {
            $table->dropColumn('rifa');
        });
    }
};
