<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(3),
        'price' => $faker->numberBetween(1, 100),
        'quantity' => $faker->numberBetween(1, 10),
        'image' => 'chocolate-cake-3-500x500.jpg',
        'category_id' => $faker->numberBetween(1,3)
    ];
});
