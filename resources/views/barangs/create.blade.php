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
                    <form method="post" action="{{ route('barangs.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Kode_Barang">Kode_Barang</label>
                            <input type="text" name="Kode_Barang" class="form-control" id="Kode_Barang" aria-describedby="Kode_Barang" >
                        </div>

                        <div class="form-group">
                            <label for="Nama_Barang">Nama_Barang</label> 
                            <input type="text" name="Nama_Barang" class="form-control" id="Nama_Barang" aria-describedby="Nama_Barang" >
                        </div>

                        <div class="form-group">
                            <label for="Kategori_barang">Kategori_Barang</label>
                            <input type="text" name="Kategori_barang" class="form-control" id="Kategori_barang" aria-describedby="Kategori_barang" >
                        </div>

                        <div class="form-group">
                            <label for="Harga">Harga</label>
                            <input type="text" name="Harga" class="form-control" id="Harga" aria-describedby="Harga" >
                        </div>

                        <div class="form-group">
                            <label for="Qty">Qty</label>
                            <input type="text" name="Qty" class="form-control" id="Qty" aria-describedby="Qty" >
                        </div>

                        <div class="form-group">
                            <label for="Gambar">Gambar</label> 
                            <input type="file" name="Gambar" class="form-control" id="Gambar" aria-describedby="Gambar" required="required">
                        </div> 

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-success mt3" href="{{ route('barangs.index') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection