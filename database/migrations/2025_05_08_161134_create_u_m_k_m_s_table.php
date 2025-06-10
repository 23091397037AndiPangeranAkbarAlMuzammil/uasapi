<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUMKMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->text('deskripsi');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('gambar_usaha')->nullable(); // Menambahkan kolom gambar usaha
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
        Schema::dropIfExists('u_m_k_m_s');
    }
}
