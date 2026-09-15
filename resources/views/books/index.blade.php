@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h2>Daftar Buku</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Lihat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $id => $book)
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $book['judul'] }}</td>
                    <td>{{ $book['penulis'] }}</td>
                    <td>{{ $book['tahun_terbit'] }}</td>
                    <td>
                        <a href="/books/{{ $id }}">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection