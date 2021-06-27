<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurirs', function (Blueprint $table) {     
                $table->id('Id_Kurir');
                $table->string('Kode_Kurir', 50);
                $table->string('Nama_Kurir', 100);
                $table->string('Kategori_Kurir');
                $table->string('Perusahaan'); 
                $table->text('Gambar');           
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
        Schema::dropIfExists('kurirs');
    }
}
