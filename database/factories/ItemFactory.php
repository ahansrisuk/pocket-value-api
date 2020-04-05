<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type_id' => $faker->randomDigitNotNull,
        'value' => $faker->numberBetween(1, 5000),
        'image_path' => $faker->imageUrl(),
        'location_id' => $faker->numberBetween(1, 5000),
        'time_id' => $faker->numberBetween(1, 5000),
        'northern_months' => $faker->month, 
        'southern_months' => $faker->month 
    ];
});
