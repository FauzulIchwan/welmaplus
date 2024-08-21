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
        Schema::create('portofolio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_obligasi');
            $table->unsignedBigInteger('id_nasabah');
            $table->string('order_kuota');
            $table->string('nominal_transaksi');
            $table->string('biaya_admin');
            $table->string('nominal_akhir');
            $table->string('kupon_berjalan');
            $table->string('tipe');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_obligasi')->references('id')->on('daftar_obligasi')->onDelete('cascade');
            $table->foreign('id_nasabah')->references('id')->on('nasabah')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('status_order')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
