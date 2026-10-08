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
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
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
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    //DESTROY
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
