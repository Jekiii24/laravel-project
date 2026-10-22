@extends('layouts.app')

@section('title', 'Buat Buku Baru')

@section('content')
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <h2>Tambah Buku Baru</h2>

        <div>
            <label>Masukan Judul Buku</label>
            <input type="text" name="title" placeholder="judul buku">

            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Masukan Penulis Buku</label>
            <input type="text" name="author" placeholder="penulis">

            @error('author')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Masukan Tahun Terbit</label>
            <input type="number" name="year" placeholder="tahun">

            @error('year')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Masukan Stok</label>
            <input type="number" name="stock" placeholder="stok">

            @error('stock')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Kategori Buku</label>
            <select name="category_id">
                <option value="">Pilih Kategori</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Simpan
        </button>
    </form>
@endsection