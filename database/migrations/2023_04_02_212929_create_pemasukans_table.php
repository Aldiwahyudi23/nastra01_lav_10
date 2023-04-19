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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal');
            $table->integer('jumlah');
            $table->text('keterangan');
            $table->string('kategori', 500);
            $table->string('pembayaran', 500);
            $table->string('foto', 500)->nullable();
            $table->foreignId('anggota_id')->references('id')->on('users');
            $table->foreignId('pengaju_id')->references('id')->on('users');
            $table->foreignId('pengurus_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukans');
    }
};
