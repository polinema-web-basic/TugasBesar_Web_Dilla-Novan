@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Barang
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ route('pegawais.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Kode_Pegawai">Kode_Pegawai</label>
                            <input type="text" name="Kode_Pegawai" class="form-control" id="Kode_Pegawai" aria-describedby="Kode_Pegawai" >
                        </div>

                        <div class="form-group">
                            <label for="Nama_Pegawai">Nama_Pegawai</label> 
                            <input type="text" name="Nama_Pegawai" class="form-control" id="Nama_Pegawai" aria-describedby="Nama_Pegawai" >
                        </div>

                        <div class="form-group">
                            <label for="Kategori_Pegawai">Kategori_Pegawai</label>
                            <input type="text" name="Kategori_Pegawai" class="form-control" id="Kategori_Pegawai" aria-describedby="Kategori_Pegawai" >
                        </div>

                        <div class="form-group">
                            <label for="Umur">Umur</label>
                            <input type="text" name="Umur" class="form-control" id="Umur" aria-describedby="Umur" >
                        </div>

                        <div class="form-group">
                            <label for="Gambar">Gambar</label> 
                            <input type="file" name="Gambar" class="form-control" id="Gambar" aria-describedby="Gambar" required="required">
                        </div>                  

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-success mt3" href="{{ route('pegawais.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection