<?php

namespace Database\Factories;
require_once 'vendor/autoload.php';
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(Article::class, function (Faker $faker))
    {
        // $faker = new Faker;
        // $faker = Faker\Factory::create();
        return [
            //
            
                'title' => $faker->text(),
                'author' => $faker->name,
                'date_published' => $faker->dateTime,
                'article_body' => $faker->paragraphs(3, true),
            
        ];
    }
}
