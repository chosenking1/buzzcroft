<?php

 
namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Article::factory(10)->create();
        // Article::factory()
        // ->count(50)
        // // ->hasPosts(1)
        // ->create();

        // DB::table('articles')->insert([
        //     'title'=> Str::random(10),
        //     'author' => Str::random(10),
        //     'date_published' => date(),
        //     'article_body' => str::random(700)
        // ]);
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('articles')->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'date_published' => $faker->dateTime,
                'article_body' => $faker->paragraphs(3, true)
            ]);
        }
        

    }
}
