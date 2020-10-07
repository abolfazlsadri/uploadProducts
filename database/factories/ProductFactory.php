<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => factory(App\Category::class),
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 10000, $max = 900000) ,
        'description' => $faker->words(20, true),
        'count' => $faker->numberBetween($min = 10, $max = 30) 
    ];
});
