<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    //INDEX
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    //CREATE
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
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
                    Rule::unique('books', 'title'),
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
            'category_id' => [
                'required',
                'exists:categories,id',
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
        $book = Book::findOrFail($book->id);
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
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
            'category_id' => [
                'required',
                'exists:categories,id',
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
