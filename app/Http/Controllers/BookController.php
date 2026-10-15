<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //INDEX
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    //CREATE
    public function create()
    {
        return view('books.create');
    }

    //STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    //SHOW
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    //EDIT
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    //UPDATE
    public function update(Request $request, Book $book)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900',
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
  
    }

    //DESTROY
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
