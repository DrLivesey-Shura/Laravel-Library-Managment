<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'published_date' => '1925-04-10',
            'description' => 'A story of the fabulously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan.',
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'published_date' => '1949-06-08',
            'description' => 'A dystopian novel set in a totalitarian society ruled by the Party.',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'published_date' => '1960-07-11',
            'description' => 'A novel about the serious issues of rape and racial inequality.',
        ]);
    }
}
