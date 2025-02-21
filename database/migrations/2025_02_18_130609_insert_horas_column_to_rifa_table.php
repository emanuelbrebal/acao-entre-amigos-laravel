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
            $table->time('hora_sorteio')->default('12:00:00')->after('data_sorteio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rifa', function (Blueprint $table) {
            $table->dropColumn('hora_sorteio');
        });
    }
};
