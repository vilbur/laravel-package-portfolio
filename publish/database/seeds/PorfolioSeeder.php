<?php

use Illuminate\Database\Seeder;
use Vilbur\Portfolio\Models\Portfolio;

class PorfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		if(!Portfolio::all()->first())
			factory(Portfolio::class, 1)->create();
    }
}
