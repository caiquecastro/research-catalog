<?php

use Faker\Generator as Faker;

$factory->define(App\Researcher::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'birthday' => $faker->dateTimeThisCentury,
        'email' => $faker->email,
        'address' => $faker->address,
        'gender' => $faker->randomElement(['M', 'F']),
        'phone' => $faker->phoneNumber,
        'mobile_phone' => $faker->phoneNumber,
        'status' => $faker->randomElement(['active']),
        'role_id' => function () {
            return factory(App\Role::class)->create()->id;
        },
        'admission_date' => $faker->dateTimeThisDecade,
    ];
});
