@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif


    <h1>Daftar Buku</h1>

    <p>Daftar Buku yang Tersedia di PerpustakaanQu</p>
    <a href="{{ route('books.create') }}">Tambah Buku</a>
    <br>
    <br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Lihat Detail</th>
                <th>Edit buku</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name ?? 'Belum Ada Kategori' }}</td>
                    <td><a href="{{ route('books.show', $book->id) }}">Lihat Detail</a></td>
                    <td><a href="{{ route('books.edit', $book->id) }}">Edit Buku</a></td>
                    <td>
                        @can('delete', $book)
                            <form action="{{ route('books.destroy', $book->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection