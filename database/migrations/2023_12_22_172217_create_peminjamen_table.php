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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->bigIncrements('idpeminjaman');
            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buku_id');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_ambil');
            $table->integer('lama_peminjaman');
            $table->timestamps();
            $table->foreign('buku_id')->references('idbuku')->on('bukus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};

