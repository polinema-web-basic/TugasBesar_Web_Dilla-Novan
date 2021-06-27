<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('Home');
    }
    public function pegawai(){
        return view('pegawai');
    }
    public function kurir(){
        return view('kurir');
    }
    public function transaksi(){
        return view('transaksi');
    }
}
