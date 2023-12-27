<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function jadwalperiksa()
    {
        return view('jadwal-periksa');
    }

    public function memeriksapasien()
    {
        return view('memeriksa-pasien');
    }

    public function riwayatpasien()
    {
        return view('riwayat-pasien');
    }

    public function profil()
    {
        return view('profil');
    }

    public function dokter()
    {
        return view('dokter');
    }

    public function pasien()
    {
        return view('pasien');
    }

    public function poli()
    {
        return view('poli');
    }

    public function obat()
    {
        return view('obat');
    }

}
