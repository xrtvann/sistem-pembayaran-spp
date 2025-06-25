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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('siswa_id'); // diambil dari input NIS
            $table->unsignedBigInteger('id_pembagian'); // digunakan untuk tarik kelas, spp, akademik
            $table->integer('jumlah_tagihan'); // dari SPP
            $table->integer('total_bayar'); // input oleh admin
            $table->integer('sisa'); // jumlah_tagihan - total_bayar
            $table->date('tanggal_bayar');
            $table->string('bukti_pembayaran')->nullable(); // input oleh admin
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('id_pembagian')->references('id_pembagian')->on('pembagian_spp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trasaksi');
    }
};
