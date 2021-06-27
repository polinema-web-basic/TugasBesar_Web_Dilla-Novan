<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Kurir;

class UserController extends Controller
{
    public function barangs(Request $request){
        $barangs1 = DB::table('barangs')->simplePaginate(5);	
        $barangs = Barang::where([
            ['Nama_Barang','!=',Null],
            ['Kode_Barang','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('Nama_Barang','LIKE','%'.$term.'%')->get();
                    $query->orWhere('Kode_Barang','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('Id_Barang','asc')
        ->simplePaginate(3);
        
        return view('user.barangs' , compact('barangs'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function pegawais(Request $request){
        $pegawais1 = DB::table('pegawais')->simplePaginate(5);	
        $pegawais = Pegawai::where([
            ['Nama_Pegawai','!=',Null],
            ['Kode_Pegawai','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('Nama_Pegawai','LIKE','%'.$term.'%')->get();
                    $query->orWhere('Kode_Pegawai','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('Id_Pegawai','desc')
        ->simplePaginate(3);
        
        return view('user.pegawais' , compact('pegawais'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function kurirs(Request $request){
        $kurirs1 = DB::table('kurirs')->simplePaginate(5);	
        $kurirs = Kurir::where([
            ['Nama_Kurir','!=',Null],
            ['Kode_Kurir','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('Nama_Kurir','LIKE','%'.$term.'%')->get();
                    $query->orWhere('Kode_Kurir','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('Id_Kurir','desc')
        ->simplePaginate(3);
        
        return view('user.kurirs' , compact('kurirs'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
}
