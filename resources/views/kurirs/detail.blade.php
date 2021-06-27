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
                        <li class="list-group-item"><b>Id_Kurir: </b>{{$Kurir->Id_Kurir}}</li>
                        <li class="list-group-item"><b>Kode_Kurir: </b>{{$Kurir->Kode_Kurir}}</li>
                        <li class="list-group-item"><b>Nama_Kurir: </b>{{$Kurir->Nama_Kurir}}</li>
                        <li class="list-group-item"><b>Kategori_Kurir: </b>{{$Kurir->Kategori_Kurir}}</li>
                        <li class="list-group-item"><b>perusahaan: </b>{{$Kurir->Perusahaan}}</li>                       
                        <li class="list-group-item"><b>Gambar: </b>{{$Kurir->Gambar}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('kurirs.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection