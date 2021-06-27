@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <h1>Data Kurir</h1>
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
            <div class="col-sm">
                <a class="btn btn-success" href="{{ route('kurirs.create') }}">Input Kurir</a>
            </div>
            
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('kurirs.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('kurirs.index') }}" class="mr-4 mt-1">
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
                    <th>Id_Kurir</th>
                    <th>Kode_Kurir</th>
                    <th>Nama_Kurir</th>
                    <th>Kategori_Kurir</th>
                    <th>Perusahaan</th>         
                    <th>Gambar</th> 
                    <th width="280px">Action</th>
                </tr>
                @foreach ($kurirs as $Kurir)
                <tr>
                    <td>{{ $Kurir->Id_Kurir }}</td>
                    <td>{{ $Kurir->Kode_Kurir }}</td>
                    <td>{{ $Kurir->Nama_Kurir }}</td>
                    <td>{{ $Kurir->Kategori_Kurir }}</td>
                    <td>{{ $Kurir->Perusahaan }}</td>
                    <td><img width="200px" src="{{asset('storage/'.$Kurir->Gambar)}}" alt=""></td>  
                    <td>
                        <form action="{{ route('kurirs.destroy',$Kurir->Id_Kurir) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kurir?')">
                            <a class="btn btn-info" href="{{ route('kurirs.show',$Kurir->Id_Kurir) }}">Detail</a>
                            <a class="btn btn-primary" href="{{ route('kurirs.edit',$Kurir->Id_Kurir) }}">Edit</a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                </thead>
            </table>
            {{ $kurirs->links() }}
        </div>
    </div>
</section> 
@endsection