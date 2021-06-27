@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Banner -->
    <section class="main-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-caption">
                                    <h4>Selamat Datang di website <em>Sistem Informasi Barang</em></h4>
                                    @guest
                                    <p>Silahkan gunakan tombol <strong>Login</strong>
                                    </p>
                                    <div class="primary-button">
                                        <a href="{{ route('login') }}">LOGIN</a>
                                    </div>
                                    @else 
                                    <p>Silahkan gunakan tombol <strong>barang</strong> untuk melihat data barang!
                                    </p>
                                    <div class="primary-button">
                                        <a href="{{ route('barangs.index') }}">Barang</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
