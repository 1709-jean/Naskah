<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klaim', function (Blueprint $table) {
            $table->increments('id_klaim');
            $table->integer('id_user');
            $table->integer('id_postingan');
            $table->text('jawaban_klaim');
            $table->string('gambar_klaim')->nullable();
            $table->enum('status_klaim', ['pending', 'true', 'false']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klaim');
    }
}
