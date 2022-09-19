<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create(['genre_name'=>'Horror']);
        Genre::create(['genre_name'=>'Kids']);
        Genre::create(['genre_name'=>'Mystery']);
        Genre::create(['genre_name'=>'Poetry']);
        Genre::create(['genre_name'=>'Romance']);
        Genre::create(['genre_name'=>'Sci-Fi & Fantasy']);
        Genre::create(['genre_name'=>'Thriller']);
    }
}
