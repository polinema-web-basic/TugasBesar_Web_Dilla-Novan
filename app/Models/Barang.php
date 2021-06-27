<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; // Model Eloquent

class Barang extends Model
{
    protected $table="barangs"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps= false;
    protected $primaryKey = 'Id_Barang'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'Id_Barang',
        'Kode_Barang',
        'Nama_Barang',
        'Kategori_barang',
        'Harga',
        'Qty',
        'Gambar',
        ];

        public function transaksi(){
            return $this->hasMany(Transaksi::class);
        }
}
