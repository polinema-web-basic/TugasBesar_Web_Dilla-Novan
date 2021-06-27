@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Pegawai
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id_Pegawai: </b>{{$Pegawai->Id_Pegawai}}</li>
                        <li class="list-group-item"><b>Kode_Pegawai: </b>{{$Pegawai->Kode_Pegawai}}</li>
                        <li class="list-group-item"><b>Nama_Pegawai: </b>{{$Pegawai->Nama_Pegawai}}</li>
                        <li class="list-group-item"><b>Kategori_Pegawai: </b>{{$Pegawai->Kategori_Pegawai}}</li>
                        <li class="list-group-item"><b>Umur: </b>{{$Pegawai->Umur}}</li>                       
                        <li class="list-group-item"><b>Gambar: </b>{{$Pegawai->Gambar}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('pegawais.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection