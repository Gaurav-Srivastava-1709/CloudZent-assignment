<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Harry Potter', 'author' => 'J.K. Rowling', 'publishedYear' => 1997],
            ['title' => 'The Alchemist', 'author' => 'Paulo Coelho', 'publishedYear' => 1988],
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'publishedYear' => 1925],
            ['title' => '1984', 'author' => 'George Orwell', 'publishedYear' => 1949],
            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'publishedYear' => 1960],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'publishedYear' => 1813],
            ['title' => 'The Catcher in the Rye', 'author' => 'J.D. Salinger', 'publishedYear' => 1951],
            ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'publishedYear' => 1937],
            ['title' => 'The Lord of the Rings', 'author' => 'J.R.R. Tolkien', 'publishedYear' => 1954],
            ['title' => 'Animal Farm', 'author' => 'George Orwell', 'publishedYear' => 1945],
            ['title' => 'Moby Dick', 'author' => 'Herman Melville', 'publishedYear' => 1851],
            ['title' => 'War and Peace', 'author' => 'Leo Tolstoy', 'publishedYear' => 1869],
            ['title' => 'The Odyssey', 'author' => 'Homer', 'publishedYear' => -800],
            ['title' => 'Crime and Punishment', 'author' => 'Fyodor Dostoevsky', 'publishedYear' => 1866],
            ['title' => 'Brave New World', 'author' => 'Aldous Huxley', 'publishedYear' => 1932],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
