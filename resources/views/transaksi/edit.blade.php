@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Booking
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

                    <form method="post" action="{{ route('transaksis.update', $Transaksi->id) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="barang_id">Barang</label>
                            <select name="barang_id" id="barang_id" class="form-control">
                                <option selected disabled>Pilih Barang</option>
                            @foreach($Barang as $br)
                                <option value="{{ $br->Id_Barang }}">{{ $Transaksi->barang_id == $br->Id_Barang ? 'selected': ''}}>{{ $br->Nama_Barang }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pegawai_id">Pegawai</label>
                            <select name="pegawai_id" id="pegawai_id" class="form-control">
                                <option selected disabled>Pilih Pegawai</option>
                            @foreach($Pegawai as $pg)
                                <option value="{{ $pg->Id_Pegawai }}">{{ $Transaksi->pegawai_id == $pg->Id_Pegawai ? 'selected': ''}}>{{ $pg->Nama_Pegawai }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kurir_id">Kurir</label>
                            <select name="kurir_id" id="kurir_id" class="form-control">
                                <option selected disabled>Pilih Kurir</option>
                            @foreach($Kurir as $kr)
                                <option value="{{ $kr->Id_Kurir }}">{{ $Transaksi->kurir_id == $kr->Id_Kurir ? 'selected': ''}}>{{ $kr->Nama_Kurir }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jmlh">Jumlah</label>
                            <input type="text" name="jmlh" class="form-control" id="jmlh" value="{{ $Transaksi->jmlh }}" aria-describedby="jmlh" required="required">
                        </div>

                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" name="total_bayar" class="form-control" id="total_bayar" value="{{ $Transaksi->total_bayar }}" aria-describedby="total_bayar" required="required">
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="date" name="tgl" class="form-control" id="tgl" value="{{ $Transaksi->tgl }}" aria-describedby="tgl" placeholder="dd-mm-yyyy" 
                            value="" min="1997-01-01" max=<?php echo date('Y-m-d'); ?> placeholder="Pilih Tanggal">
                        </div>
                            
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('transaksis.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
