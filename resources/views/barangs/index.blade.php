@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <h1>Data Barang</h1>
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
                <a class="btn btn-success" href="{{ route('barangs.create') }}">Input Barang</a>
            </div>
            
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('barangs.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('barangs.index') }}" class="mr-4 mt-1">
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
                    <th>Id_Barang</th>
                    <th>Kode_Barang</th>
                    <th>Nama_Barang</th>
                    <th>Kategori_Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>     
                    <th>Gambar</th> 
                    <th width="280px">Action</th>
                </tr>
                @foreach ($barangs as $Barang)
                <tr>            
                    <td>{{ $Barang->Id_Barang }}</td>
                    <td>{{ $Barang->Kode_Barang }}</td>
                    <td>{{ $Barang->Nama_Barang }}</td>
                    <td>{{ $Barang->Kategori_barang }}</td>
                    <td>{{ $Barang->Harga }}</td>
                    <td>{{ $Barang->Qty }}</td>  
                    <td><img width="200px" src="{{asset('storage/'.$Barang->Gambar)}}" alt=""></td>                     
                    <td>
                        <form action="{{ route('barangs.destroy',$Barang->Id_Barang) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data barang?')">
                            <a class="btn btn-info" href="{{ route('barangs.show',$Barang->Id_Barang) }}">Detail</a>
                            <a class="btn btn-primary" href="{{ route('barangs.edit',$Barang->Id_Barang) }}">Edit</a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                </thead>
            </table>
            {{ $barangs->links() }}
        </div>
    </div>
</section> 
    @endsection
