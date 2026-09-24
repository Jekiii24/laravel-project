<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::all();
        $stock = 15;

        return view('books.index', compact('books', 'stock'));
    }
    
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}