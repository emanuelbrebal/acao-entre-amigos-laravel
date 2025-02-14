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
            $table->boolean('ativado')->default(true)->after('instituicao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rifa', function (Blueprint $table) {
            $table->dropColumn('ativado');
        });
    }
};
