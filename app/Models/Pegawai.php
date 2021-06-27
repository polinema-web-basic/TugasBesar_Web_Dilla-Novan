<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; // Model Eloquent

class Pegawai extends Model
{
    
    protected $table="pegawais"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps= false;
    protected $primaryKey = 'Id_Pegawai'; // Memanggil isi DB Dengan primarykey

    protected $fillable = [
        'Id_Pegawai',
        'Kode_Pegawai',
        'Nama_Pegawai',
        'Kategori_Pegawai',
        'Umur',
        'Gambar',       
        ];

        public function transaksi(){
            return $this->hasMany(Transaksi::class);
        }
}
