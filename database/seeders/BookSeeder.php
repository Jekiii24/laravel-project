<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Laravel for Beginners',
            'author' => 'Rizqi Rahmatullah',
            'year' => 2020,
            'stock' => 10,
        ]);

        Book::create([
            'title' => 'Mastering PHP',
            'author' => 'Pak Kamal',
            'year' => 2019,
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'JavaScript Essentials',
            'author' => 'Nabil Rahman',
            'year' => 2021,
            'stock' => 8,
        ]);

        Book::create([
            'title' => 'Python for Data Science',
            'author' => 'Siti Ropeah',
            'year' => 2022,
            'stock' => 12,
        ]);

        Book::create([
            'title' => 'Introduction to HTML and CSS',
            'author' => 'Ahmad Hamba Allah',
            'year' => 2018,
            'stock' => 15,
        ]);
    }
}
