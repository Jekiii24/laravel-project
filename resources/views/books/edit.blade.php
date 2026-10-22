@extends('layouts.app')

@section('title', 'Update Buku')

@section('content')
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Masukan Judul Baru</label>
            <input type="text" name="title" placeholder="judul buku" value="{{ $book->title }}">

            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Masukan Penulis Baru</label>
            <input type="text" name="author" placeholder="penulis" value="{{ $book->author }}">
            @error('author')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Masukan Tahun Terbit Baru</label>
            <input type="number" name="year" placeholder="tahun" value="{{ $book->year }}">
            @error('year')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Masukan Stok Baru</label>
            <input type="number" name="stock" placeholder="stok" value="{{ $book->stock }}">
            @error('stock')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label>Kategori Buku</label>
            <select name="category_id">
                <option value="">Pilih Kategori</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Update
        </button>
    </form>
@endsection