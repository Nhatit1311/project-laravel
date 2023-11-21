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
        Schema::create('lich_chieus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_phong');
            $table->integer('id_phim');
            $table->integer('thoi_gian_chieu_chinh');
            $table->integer('thoi_gian_quang_cao');
            $table->dateTime('thoi_gian_bat_dau');
            $table->dateTime('thoi_gian_ket_thuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_chieus');
    }
};
