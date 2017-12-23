<?php

use Faker\Generator as Faker;

$factory->define(App\Keyword::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
