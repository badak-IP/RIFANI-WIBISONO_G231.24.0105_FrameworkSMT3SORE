<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_mahasiswa', function (Blueprint $table) {
            $table->id();                            // ID pendaftaran
            $table->string('nim');                    // NIM mahasiswa
            $table->string('nik');                    // NIK mahasiswa
            $table->string('nama_mahasiswa');         // Nama mahasiswa
            $table->string('tempat_lahir');           // Tempat lahir mahasiswa
            $table->date('tanggal_lahir');            // Tanggal lahir mahasiswa
            $table->unsignedBigInteger('id_progdi');  // ID Program Studi (relasi dengan tabel progdi)
            $table->timestamps();                    // Timestamps (created_at, updated_at)

            // Menambahkan foreign key constraint untuk id_progdi yang mengarah ke tabel progdis
            $table->foreign('id_progdi')->references('id_progdi')->on('progdis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_mahasiswa');
    }
};
