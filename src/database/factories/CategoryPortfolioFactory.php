<?php

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

$factory->define(\Vilbur\Portfolio\Models\CategoryPortfolio::class, function (Faker $faker) {
    return [
		'title'	=> $faker->word(1, true),
		'summary'	=> $faker->sentence(6, true),
		'description'	=> $faker->text(128),
    ];
});
