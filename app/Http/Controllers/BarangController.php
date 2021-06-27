<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        
        return view('barangs.index' , compact('barangs'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Kode_Barang' => 'required',
            'Nama_Barang' => 'required',
            'Kategori_barang' => 'required',
            'Harga' => 'required',
            'Qty' => 'required',
            'Gambar' => 'required',
        ]);
        
        // Fungsi eloquent untuk menambah data
        // Barang::create($request->all());
        if ($request->file('Gambar')) 
        {
            $image_name = $request->file('Gambar')->store('images', 'public');
            Barang::create([
                'Kode_Barang'                      => $request->Kode_Barang,
                'Nama_Barang'                      => $request->Nama_Barang,
                'Kategori_barang'                  => $request->Kategori_barang,
                'Harga'                            => $request->Harga,
                'Qty'                              => $request->Qty,
                'Gambar'                           => $image_name,
            ]);
        }

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('barangs.index')
            ->with('success', 'Barang Berhasil Ditambahkan');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Id_Barang)
    {
        //
        // Menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Barang = Barang::find($Id_Barang);
        return view('barangs.detail', compact('Barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Barang)
    {
        //
        $Barang = Barang::find($Id_Barang);
        return view('barangs.edit', ['Barang' => $Barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Barang)
    {
        //
        $Barang = Barang::find($Id_Barang);
        $request->validate([
            'Kode_Barang' => 'required',
            'Nama_Barang' => 'required',
            'Kategori_barang' => 'required',
            'Harga' => 'required',
            'Qty' => 'required',
            'Gambar' => 'required',
        ]);
         // Fungsi eloquent untuk mengupdate data inputan kita
         // Barang::find($Id_Barang)->update($request->all());

        if($Barang->Gambar && file_exists(storage_path('app/public/' . $Barang->Gambar))){
            \Storage::delete('public/' . $Barang->Gambar);
        }

        $image_name = $request->file('Gambar')->store('images', 'public');
        $Barang->Gambar = $image_name;
        $Barang->save();

         // Jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect()->route('barangs.index')
             ->with('success', 'Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_Barang)
    {
        //
        // Fungsi eloquent untuk menghapus data
        Barang::find($Id_Barang)->delete();
        return redirect()->route('barangs.index')
            -> with('success', 'Barang Berhasil Dihapus');
    }
}
