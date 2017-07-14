<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'body' => $faker->text(20),
        'news_id' => 1
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(10),
        'body' => $faker->text(60),
    ];
});
