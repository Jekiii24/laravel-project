<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $appName = "Sistem Informasi Perpustakaan";
        $appDescription = "Aplikasi manajemen perpustakaan untuk mengelola data buku, anggota, dan kategori dengan mudah.";

        $totalBuku = 20;      // Jumlah buku dummy
        $totalMember = 10;     // Jumlah member dummy
        $totalKategori = 8;    // Jumlah kategori dummy

        return view('dashboard.index', compact(
            'appName',
            'appDescription',
            'totalBuku',
            'totalMember',
            'totalKategori'
        ));
    }
}