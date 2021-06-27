<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\Kurir;
use App\Models\Barang;

class Transaksi extends Model
{
    use HasFactory;
    protected $table='transaksis'; // Mendifinisikan bahwa model ini terkait dengan tabel kelas

    public $timestamps= false;
    protected $primaryKey = 'id';

    protected $fillable = ['barang_id', 'pegawai_id', 'kurir_id', 'jmlh', 'total_bayar', 'tgl'];

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'Id_Barang');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'Id_Pegawai');
    }
    
    public function kurir(){
        return $this->belongsTo(Kurir::class, 'kurir_id', 'Id_Kurir');
    }
}
