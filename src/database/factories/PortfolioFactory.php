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

$factory->define(\Vilbur\Portfolio\Models\Portfolio::class, function (Faker $faker) {
    return [
		'category_id'	=> $faker->randomElement(\DB::table('category_portfolios')->select('id')->get()->toArray())->id,
		'title'	=> $faker->text(24),
		'image'	=> $faker->imageUrl(1280, 768),
		'summary'	=> $faker->sentence(6, true),
		'description'	=> $faker->text(128),
    ];
});
