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
        Schema::create('daftar_obligasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obligasi');
            $table->string('kode_obligasi');
            $table->string('tanggal_penerbitan');
            $table->string('tanggal_jatuh_tempo');
            $table->string('kupon');
            $table->string('yield');
            $table->float('harga_beli');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_obligasi');
    }
};
