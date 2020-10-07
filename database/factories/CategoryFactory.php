<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'title' => $faker->title,
        'description' => $faker->words(20, true)
    ];
});
