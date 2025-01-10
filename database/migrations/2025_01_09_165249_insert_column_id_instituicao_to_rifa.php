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
        Schema::table('rifa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_instituicao')->nullable();
            $table->foreign('id_instituicao')->references('id')->on('instituicao')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rifa', function (Blueprint $table) {
            $table->dropColumn('id_instituicao');
        });
    }
};
