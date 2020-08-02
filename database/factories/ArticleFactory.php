<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$data = $factory->define(Article::class, function (Faker $faker) {
    $min = 1;
    $max = 4;
    return [
        'title' => $faker->title() . $faker->firstName(),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'content' => $faker->text($maxNbChars = 200),
        'slug' => $faker->slug(),
        'category_id' => rand($min, $max),
        'published_at' => $faker->dateTime($max = 'now', $timezone = null)
    ];
});

