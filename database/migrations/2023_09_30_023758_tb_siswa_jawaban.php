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
        Schema::create('tb_siswa_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id'); // Kolom id sebagai primary key
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_materi');
            $table->unsignedBigInteger('id_soal');
            $table->string('jawaban_siswa');
            $table->timestamps();
        });

        Schema::table('tb_siswa_jawaban', function (Blueprint $table) {
            $table->foreign('id_siswa')->references('user_id')->on('tb_user');
            $table->foreign('id_materi')->references('id')->on('tb_materi')->onDelete('cascade');
            $table->foreign('id_soal')->references('id')->on('tb_kuis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_siswa_jawaban');
    }
};
