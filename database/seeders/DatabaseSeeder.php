<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Prize;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Prize::factory(15)->for(Book::factory(), 'book')->create();
        Category::factory(15)->for(Book::factory(), 'book')->create();
        Author::factory(15)->hasBooks(rand(1,3))->create();
    }
}
