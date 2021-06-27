<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        
        return view('pegawais.index' , compact('pegawais'))
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
        return view('pegawais.create');
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
            'Kode_Pegawai' => 'required',
            'Nama_Pegawai' => 'required',
            'Kategori_Pegawai' => 'required',
            'Umur' => 'required',
            'Gambar' => 'required',
        ]);

            // Fungsi eloquent untuk menambah data
            // Pegawai::create($request->all());
            if ($request->file('Gambar')) 
            {
                $image_name = $request->file('Gambar')->store('images', 'public');
                Pegawai::create([
                    'Kode_Pegawai'                      => $request->Kode_Pegawai,
                    'Nama_Pegawai'                      => $request->Nama_Pegawai,
                    'Kategori_Pegawai'                  => $request->Kategori_Pegawai,
                    'Umur'                              => $request->Umur,
                    'Gambar'                            => $image_name,
                ]);
            }

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pegawais.index')
            ->with('success', 'Pegawai Berhasil Ditambahkan');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Id_Pegawai)
    {
        //
        // Menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Pegawai = Pegawai::find($Id_Pegawai);
        return view('pegawais.detail', compact('Pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Pegawai)
    {
        //
        $Pegawai = Pegawai::find($Id_Pegawai);
        return view('pegawais.edit', ['Pegawai' => $Pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_Pegawai)
    {
        //
        $request->validate([
            'Kode_Pegawai' => 'required',
            'Nama_Pegawai' => 'required',
            'Kategori_Pegawai' => 'required',
            'Umur' => 'required',
            'Gambar' => 'required',
        ]);
        // Fungsi eloquent untuk mengupdate data inputan kita
        // Pegawai::find($Id_Pegawai)->update($request->all());
        $pegawais = Pegawai::find($Id_Pegawai);
        $pegawais->Kode_Pegawai = $request->Kode_Pegawai;
        $pegawais->Nama_Pegawai = $request->Nama_Pegawai;
        $pegawais->Kategori_Pegawai = $request->Kategori_Pegawai;
        $pegawais->Umur = $request->Umur;

        if($pegawais->Gambar && file_exists(storage_path('app/public/' . $pegawais->Gambar))){
            \Storage::delete('public/' . $pegawais->Gambar);
        }

        $image_name = $request->file('Gambar')->store('images', 'public');
        $pegawais->Gambar = $image_name;
        $pegawais->save();

         // Jika data berhasil diupdate, akan kembali ke halaman utama
         return redirect()->route('pegawais.index')
             ->with('success', 'Pegawai Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_Pegawai)
    {
        //
        // Fungsi eloquent untuk menghapus data
        Pegawai::find($Id_Pegawai)->delete();
        return redirect()->route('pegawais.index')
            -> with('success', 'Pegawai Berhasil Dihapus');
    }
    public function kembali(){
        return view('Home');
    }
}
