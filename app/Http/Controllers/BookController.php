<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Validation\Rule;

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
            'title' =>
                [
                    'bail',
                    'required',
                    'string',
                    'max:255',
                    'unique:books,title,',
                ],
            'author' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/',
            ],
            'year' => [
                'required',
                'integer',
                'between:1900,' . now()->year,
            ],
            'stock' => [
                'required',
                'integer',
                'min:0',
                'max_digits:5',
            ],
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
            'title' => [
                'bail',
                'required',
                'string',
                'max:255',
                Rule::unique('books', 'title')->ignore($book->id),
            ],

            'author' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z\s]+$/',
            ],

            'year' => [
                'required',
                'integer',
                'between:1900,' . now()->year,
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
                'max_digits:5',
            ],
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
