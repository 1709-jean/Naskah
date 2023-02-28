<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Postingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postingan', function (Blueprint $table) {
            $table->Increments('id_postingan');
            $table->Integer('id_user');
            $table->Integer('id_kategori');
            $table->enum('jenis_berita', ['lost', 'found']);
            $table->text('detail_berita');
            $table->string('kode')->nullable();
            $table->date('tanggal_berita')->nullable();
            $table->string('waktu_berita')->nullable();
            $table->enum('status_postingan', ['true', 'false', 'clear']);
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
        Schema::dropIfExists('postingan');
    }
}
