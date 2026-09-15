@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Judul Aplikasi -->
    <h2>{{ $appName }}</h2>

    <!-- Deskripsi Aplikasi -->
    <p>{{ $appDescription }}</p>

    <!-- Informasi Jumlah Data Dummy -->
    <ul>
        <li>Jumlah Buku: {{ $totalBuku }}</li>
        <li>Jumlah Member: {{ $totalMember }}</li>
        <li>Jumlah Kategori: {{ $totalKategori }}</li>
    </ul>
@endsection