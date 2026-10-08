@extends('layouts.app')

@section('title', 'Buat Buku Baru')

@section('content')
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Judul Buku" required>
        <input type="text" name="author" placeholder="Penulis Buku" required>
        <input type="number" name="year" placeholder="Tahun Terbit" required>
        <input type="number" name="stock" placeholder="Stok Buku" required>

        <button type="submit">Simpan</button>
    </form>

@endsection