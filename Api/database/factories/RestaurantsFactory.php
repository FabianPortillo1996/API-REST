<?php

use Faker\Generator as Faker;

$factory->define(App\Restaurants::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>$faker->text($maxNbChars=50),
        'url_image' => $faker->text($maxNbChars=10),
    ];
});
