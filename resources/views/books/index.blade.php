@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>

    <p>Daftar Buku yang Tersedia di PerpustakaanQu</p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection