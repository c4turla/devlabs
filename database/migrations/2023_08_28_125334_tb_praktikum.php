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
        Schema::create('tb_praktikum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_id');
            $table->text('judul_praktikum');
            $table->string('gambar')->nullable();
            $table->text('simulasi');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('materi_id')->references('id')->on('tb_materi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
