@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Pegawai
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

                    <form method="post" action="{{ route('kurirs.update', $Kurir->Id_Kurir) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Kode_Kurir">Kode_Kurir</label>
                            <input type="text" name="Kode_Kurir" class="form-control" id="Kode_Kurir" value="{{ $Kurir->Kode_Kurir}}" aria-describedby="Kode_Kurir" >
                        </div>

                        <div class="form-group">
                            <label for="Nama_Kurir">Nama_Kurir</label>
                            <input type="text" name="Nama_Kurir" class="form-control" id="Nama_Kurir" value="{{ $Kurir->Nama_Kurir }}" aria-describedby="Nama_Kurir" >
                        </div>

                        <div class="form-group">
                            <label for="Kategori_Kurir">Kategori_Kurir</label>
                            <input type="text" name="Kategori_Kurir" class="form-control" id="Kategori_Kurir" value="{{ $Kurir->Kategori_Kurir }}" aria-describedby="Kategori_Kurir" >
                        </div>

                        <div class="form-group">
                            <label for="Umur">Umur</label>
                            <input type="text" name="Perusahaan" class="form-control" id="Perusahaan" value="{{ $Kurir->Perusahaan }}" aria-describedby="Perusahaan" >
                        </div>

                        <div class="form-group">
                            <label for="Gambar">Gambar</label> 
                            <input type="file" name="Gambar" class="form-control" id="Gambar" value="{{ $Kurir->Gambar }}" aria-describedby="Gambar" required="required">
                            <img width="150px" src="{{asset('storage/'.$Kurir->Gambar)}}">
                        </div>   
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-success mt3" href="{{ route('kurirs.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
