<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Kurir;
use App\Models\Transaksi;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $transaksis = Transaksi::where([
            ['jmlh','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('jmlh','LIKE','%'.$term.'%')
                          ->orWhere('total_bayar','LIKE','%'.$term.'%')
                          ->orWhere('barang_id','LIKE','%'.$term.'%')
                          ->orWhere('pegawai_id','LIKE','%'.$term.'%')
                          ->orWhere('kurir_id','LIKE','%'.$term.'%')
                          ->orWhere('tgl','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('transaksi.index' , compact('transaksis'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $pegawai = Pegawai::all();
        $kurir = Kurir::all();
        return view('transaksi.create', compact('barang', 'pegawai', 'kurir'));
        // return $tipe_wisatas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'barang_id' => 'required',
            'pegawai_id' => 'required',
            'kurir_id' => 'required',
            'jmlh' => 'required',
            'total_bayar' => 'required',
            'tgl' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        $transaksis = new Transaksi;
        $transaksis->id = $request->get('id');
        $transaksis->barang_id = $request->get('barang_id');
        $transaksis->pegawai_id = $request->get('pegawai_id');
        $transaksis->kurir_id = $request->get('kurir_id');
        $transaksis->jmlh = $request->get('jmlh');
        $transaksis->total_bayar = $request->get('total_bayar');
        $transaksis->tgl = $request->get('tgl');
        $transaksis->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('transaksis.index')
            ->with('success', 'Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $transaksis = Transaksi::with('barang')->where('id', $id)->first();
        $barangs = Barang::all();
        $pegawais = Pegawai::all();
        $kurirs = Kurir::all();
        return view('transaksi.detail', ['Transaksi' => $transaksis, 'Barang' => $barangs, 'Pegawai' => $pegawais, 'Kurir' => $kurirs ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $transaksis = Transaksi::with('barang')->where('id', $id)->first();
        $barangs = Barang::all();
        $pegawais = Pegawai::all();
        $kurirs = Kurir::all();
        return view('transaksi.edit', ['Transaksi' => $transaksis, 'Barang' => $barangs, 'Pegawai' => $pegawais, 'Kurir' => $kurirs ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi data
        $request->validate([
            'barang_id' => 'required',
            'pegawai_id' => 'required',
            'kurir_id' => 'required',
            'jmlh' => 'required',
            'total_bayar' => 'required',
            'tgl' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        $transaksis = Transaksi::find($id)->update($request->all());

        $barangs = new Barang;
        $barangs->Id_Barang = $request->get('barang_id');

        $pegawais = new Pegawai;
        $pegawais->Id_Pegawai = $request->get('pegawai_id');

        $kurirs = new Kurir;
        $kurirs->Id_Kurir = $request->get('kurir_id');

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('transaksis.index')
            ->with('success', 'Transaksi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Transaksi::find($id)->delete();
        return redirect()->route('transaksis.index')
            -> with('success', 'Transaksi Berhasil Dihapus');
    }

    public function cetak_pdf($id){
        $transaksis = Transaksi::with('barang')
            ->where('id', $id)
            ->get();
        $pdf = PDF::loadview('transaksi.transaksi_pdf', compact('transaksis'));
        return $pdf->stream();
    }
}
