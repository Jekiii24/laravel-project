<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Fungsi privat untuk menyimpan data dummy agar bisa dipanggil di index() maupun show()
    private function getBooksData()
    {
        return [
            1 => [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => 2005
            ],
            2 => [
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1980
            ],
            3 => [
                'judul' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'tahun_terbit' => 2018
            ],
            4 => [
                'judul' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'tahun_terbit' => 2002
            ],
            5 => [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'tahun_terbit' => 2009
            ],
        ];
    }

    public function index()
    {
        $books = $this->getBooksData();
        $stock = 15;

        return view('books.index', compact('books', 'stock'));
    }

    public function show($id)
    {
        $books = $this->getBooksData();

        // Cek apakah ID ada di dalam array
        if (!isset($books[$id])) {
            abort(404, 'Buku tidak ditemukan');
        }

        $book = $books[$id];

        // Kamu bisa return view atau teks sederhana dulu
        return "Detail Buku ID: {$id} <br>" .
            "Judul: {$book['judul']} <br>" .
            "Penulis: {$book['penulis']} <br>" .
            "Tahun Terbit: {$book['tahun_terbit']}";
    }
}