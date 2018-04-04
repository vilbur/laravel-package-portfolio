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

$factory->define(\Vilbur\Portfolio\Models\PortfolioFile::class, function (Faker $faker) {
    return [
		'portfolio_item_id'	=> $faker->randomElement(\DB::table('portfolio_items')->select('id')->get()->toArray())->id,
		'title'	=> $faker->text(24),
		'author'	=> $faker->name(),
		'image'	=> "https://picsum.photos/1600/1200?image=" . $faker->numberBetween(1, 100),
		'summary'	=> $faker->sentence(6, true),
		'description'	=> $faker->text(128),
    ];
});
