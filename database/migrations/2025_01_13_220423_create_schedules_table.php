<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('area_id')->constrained()->onDelete('cascade'); // Relasi ke Area
        $table->string('cleaner_name'); // Nama petugas pembersih
        $table->date('schedule_date');  // Tanggal pembersihan
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
