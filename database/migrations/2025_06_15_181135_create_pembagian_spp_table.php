<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembagian_spp', function (Blueprint $table) {
            $table->id('id_pembagian');
            $table->unsignedBigInteger('id_akademik');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_spp');
            $table->unsignedBigInteger('siswa_id')->nullable(); // null saat awal, ditambah kemudian
            $table->timestamps();

            $table->foreign('id_akademik')->references('id_akademik')->on('akademik')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');

            $table->unique(['id_akademik', 'id_kelas', 'siswa_id'], 'unique_siswa_kelas_per_akademik');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembagian_spp');
    }
};
