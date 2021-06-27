<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Kurir;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // fungsi eloquent menampilkan data menggunakan pagination
        /*$barangs = Barang::all(); 
        $post = Barang::orderBy('Id_Barang', 'desc')->paginate(6);
        return view('barangs.index', compact('barangs'));
        with('i', (request()->input('page', 1) - 1) * 5);*/

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
        
        return view('kurirs.index' , compact('kurirs'))
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
        return view('kurirs.create');
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
            'Kode_Kurir' => 'required',
            'Nama_Kurir' => 'required',
            'Kategori_Kurir' => 'required',
            'Perusahaan' => 'required',
            'Gambar' => 'required',
        ]);

            // Fungsi eloquent untuk menambah data
            // Kurir::create($request->all());

            if ($request->file('Gambar')) 
            {
                $image_name = $request->file('Gambar')->store('images', 'public');
                Kurir::create([
                    'Kode_Kurir'                      => $request->Kode_Kurir,
                    'Nama_Kurir'                      => $request->Nama_Kurir,
                    'Kategori_Kurir'                  => $request->Kategori_Kurir,
                    'Perusahaan'                      => $request->Perusahaan,
                    'Gambar'                          => $image_name,
                ]);
            }    

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('kurirs.index')
            ->with('success', 'Kurir Berhasil Ditambahkan');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Id_Kurir)
    {
        //
        // Menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Kurir = Kurir::find($Id_Kurir);
        return view('kurirs.detail', compact('Kurir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Kurir)
    {
        //
        $Kurir = Kurir::find($Id_Kurir);
        return view('kurirs.edit', compact('Kurir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Kurir)
    {
        //
        $request->validate([
            'Kode_Kurir' => 'required',
            'Nama_Kurir' => 'required',
            'Kategori_Kurir' => 'required',
            'Perusahaan' => 'required',
            'Gambar' => 'required',
        ]);
         // Fungsi eloquent untuk mengupdate data inputan kita
        //  Kurir::find($Id_Kurir)->update($request->all());

        $kurirs = Kurir::find($Id_Kurir);
        $kurirs->Kode_Kurir = $request->Kode_Kurir;
        $kurirs->Nama_Kurir = $request->Nama_Kurir;
        $kurirs->Kategori_Kurir = $request->Kategori_Kurir;
        $kurirs->Perusahaan = $request->Perusahaan;

        if($kurirs->Gambar && file_exists(storage_path('app/public/' . $kurirs->Gambar))){
            \Storage::delete('public/' . $kurirs->Gambar);
        }

        $image_name = $request->file('Gambar')->store('images', 'public');
        $kurirs->Gambar = $image_name;
        $kurirs->save();

         // Jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect()->route('kurirs.index')
             ->with('success', 'Kurir Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_Kurir)
    {
        //
        // Fungsi eloquent untuk menghapus data
        Kurir::find($Id_Pegawai)->delete();
        return redirect()->route('kurirs.index')
            -> with('success', 'Kurir Berhasil Dihapus');
    }
    
}
