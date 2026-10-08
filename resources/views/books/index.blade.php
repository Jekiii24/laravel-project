@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>

    <p>Daftar Buku yang Tersedia di PerpustakaanQu</p>
    <a href="{{ route('books.create') }}">Tambah Buku</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Lihat Detail</th>
                <th>Edit buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td><a href="{{ route('books.show', $book->id) }}">Lihat Detail</a></td>
                    <td><a href="{{ route('books.edit', $book->id) }}">Edit Buku</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection