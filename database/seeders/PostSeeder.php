<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        for($i=0 ; $i<=20; $i++){

            $c = Category::inRandomOrder()->first();
            $title = Str::random(20);

            Post::create(
                [
                    'title'=> $title,
                    'slug' => Str::slug($title),
                    'description' => "<p>descripción $i</p>",
                    'content' => "contenido $i",
                    'posted' => "yes",
                    'category_id' => $c->id,
                ]
            );
        }
    }
}
