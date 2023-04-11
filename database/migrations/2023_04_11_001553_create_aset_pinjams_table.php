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
        Schema::create('aset_pinjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pinjam_id')->references('id')->on('aset_pinjams');
            $table->foreignId('aset_id')->references('id')->on('asets');
            $table->foreignId('anggota_id')->references('id')->on('users');
            $table->string('kode');
            $table->string('nama_peminjam');
            $table->timestamp('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->text('alasan');
            $table->string('qty');
            $table->string('persen')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('status')->nullable();
            $table->string('foto', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_pinjams');
    }
};
