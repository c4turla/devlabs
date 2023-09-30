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
        Schema::create('tb_materi_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('materi_id');
            $table->unsignedBigInteger('praktikum_id')->nullable();
            $table->unsignedBigInteger('kuis_id')->nullable();
            $table->decimal('skor', 5, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('tb_user')->onDelete('cascade');
            $table->foreign('materi_id')->references('id')->on('tb_materi')->onDelete('cascade');
            $table->foreign('praktikum_id')->references('id')->on('tb_praktikum')->onDelete('cascade');
            $table->foreign('kuis_id')->references('id')->on('tb_kuis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_materi_user');
    }
};
