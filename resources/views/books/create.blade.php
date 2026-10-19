@extends('layouts.app')

@section('title', 'Buat Buku Baru')

@section('content')
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>judul buku</label>
            <input type="text" name="title" placeholder="judul buku">

            @error('title')
                <p class ="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>penulis</label>
            <input type="text" name="author" placeholder="penulis">

            @error('author')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>tahun</label>
            <input type="number" name="year" placeholder="tahun">

            @error('year')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>stok</label>
            <input type="number" name="stock" placeholder="stok">

            @error('stock')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Simpan
        </button>
    </form>
@endsection