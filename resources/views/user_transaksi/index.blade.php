@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <h1>Data Transaksi</h1>
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
                <a class="btn btn-success" href="{{ route('user_transaksis.create') }}">Input Transaksi</a>
            </div>
            
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('user_transaksis.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('user_transaksis.index') }}" class="mr-4 mt-1">
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
                        <th scope="">Id Transaksi</th>
                        <th scope="">Barang</th>
                        <th scope="">Pegawai</th>
                        <th scope="">Kurir</th>
                        <th scope="">Jumlah</th>
                        <th scope="">Total Bayar</th>
                        <th scope="">Tanggal</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($transaksis as $Transaksi)
                    <tr>
                        <td>{{ $Transaksi->id }}</td>
                        <td>{{ $Transaksi->barang->Nama_Barang }}</td>
                        <td>{{ $Transaksi->pegawai->Nama_Pegawai }}</td>
                        <td>{{ $Transaksi->kurir->Nama_Kurir }}</td>
                        <td>{{ $Transaksi->jmlh}}</td>
                        <td>{{ $Transaksi->total_bayar}}</td>
                        <td>{{ $Transaksi->tgl }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('user_transaksis.show', $Transaksi->id ) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('user_transaksis.cetak_pdf', $Transaksi->id ) }}">Cetak</a>
                        </td>
                    </tr>
                    @endforeach
                    </thead>
                </table>
                {{ $transaksis->links() }}
                <!-- TARUH LINKS DISINI-->
            </div>
    </div>
</section> 
@endsection
