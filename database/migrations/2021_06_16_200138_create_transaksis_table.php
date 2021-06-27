<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('kurir_id');
            $table->integer('jumlah');
            $table->integer('total_bayar');
            $table->date('tgl');
            $table->foreign('barang_id')->references('Id_Barang')->on('barangs')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('Id_Pegawai')->on('pegawais')->onDelete('cascade');
            $table->foreign('kurir_id')->references('Id_Kurir')->on('kurirs')->onDelete('cascade');
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
        Schema::dropIfExists('transaksis');
    }
}
