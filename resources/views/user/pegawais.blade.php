@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <h1>Data Pegawai</h1>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('pegawais.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('pegawais.index') }}" class="mr-4 mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt">Refresh</span>
                                    </button>
                                </span>
                            </a>
                                    
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <span class="input-group-btn mr-2 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
                        </div>
                    </form>
                </div>
            </div>
    
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Id_Pegawai</th>
                    <th>Kode_Pegawai</th>
                    <th>Nama_Pegawai</th>
                    <th>Kategori_Pegawai</th>
                    <th>Umur</th>
                    <th>Gambar</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($pegawais as $Pegawai)
                <tr>
                    <td>{{ $Pegawai->Id_Pegawai }}</td>
                    <td>{{ $Pegawai->Kode_Pegawai }}</td>
                    <td>{{ $Pegawai->Nama_Pegawai }}</td>
                    <td>{{ $Pegawai->Kategori_Pegawai }}</td>
                    <td>{{ $Pegawai->Umur }}</td>
                    <td><img width="200px" src="{{asset('storage/'.$Pegawai->Gambar)}}" alt=""></td>                        
                </tr>
            @endforeach
                </thead>
            </table>
            
            {{ $pegawais->links() }} 
        </div>
    </div>
</section> 
@endsection