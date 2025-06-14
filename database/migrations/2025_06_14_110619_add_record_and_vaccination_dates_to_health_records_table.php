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
        Schema::table('health_records', function (Blueprint $table) {
            // Добавляем колонку record_date типа date
            $table->date('record_date')->nullable();

            // Добавляем колонку vaccination_date типа date
            $table->date('vaccination_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('health_records', function (Blueprint $table) {
            // Удаляем колонки при откатах
            $table->dropColumn('record_date');
            $table->dropColumn('vaccination_date');
        });
    }
};
