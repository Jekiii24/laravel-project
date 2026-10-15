@extends('layouts.app')

@section('title', 'Update Buku')

@section('content')
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>judul buku</label>
            <input type="text" name="title" placeholder="judul buku" value="{{ $book->title }}">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>penulis</label>
            <input type="text" name="author" placeholder="penulis" value="{{ $book->author }}">
            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>tahun</label>
            <input type="number" name="year" placeholder="tahun" value="{{ $book->year }}">
            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>stok</label>
            <input type="number" name="stock" placeholder="stok" value="{{ $book->stock }}">
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Update
        </button>
    </form>
@endsection