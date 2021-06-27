@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Transaksi
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Transaksi : </b>{{$Transaksi->id}}</li>
                        <li class="list-group-item"><b>Barang : </b>{{$Transaksi->barang->Nama_Barang}}</li>
                        <li class="list-group-item"><b>Pegawai : </b>{{$Transaksi->pegawai->Nama_Pegawai}}</li>
                        <li class="list-group-item"><b>Kurir : </b>{{$Transaksi->kurir->Nama_Kurir}}</li>
                        <li class="list-group-item"><b>Jumlah : </b>{{$Transaksi->jmlh}}</li>
                        <li class="list-group-item"><b>Total Bayar : </b>{{$Transaksi->total_bayar}}</li>
                        <li class="list-group-item"><b>Tanggal : </b>{{$Transaksi->tgl}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('transaksis.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection