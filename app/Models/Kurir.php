<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; // Model Eloquent

class Kurir extends Model
{
    
    protected $table="kurirs"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps= false;
    protected $primaryKey = 'Id_Kurir'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'Id_Kurir',
        'Kode_Kurir',
        'Nama_Kurir',
        'Kategori_Kurir',
        'Perusahaan',
        'Gambar',       
        ];

        public function transaksi(){
            return $this->hasMany(Transaksi::class);
        }
}