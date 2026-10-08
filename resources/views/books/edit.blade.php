@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $book->title }}" placeholder="Judul Buku" required>
        <input type="text" name="author" value="{{ $book->author }}" placeholder="Penulis Buku" required>
        <input type="number" name="year" value="{{ $book->year }}" placeholder="Tahun Terbit" required>
        <input type="number" name="stock" value="{{ $book->stock }}" placeholder="Stok Buku" required>

        <button type="submit">Update</button>
    </form>

    <p><a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a></p>

@endsection