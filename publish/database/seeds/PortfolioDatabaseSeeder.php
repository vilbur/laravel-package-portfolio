<?php

use Illuminate\Database\Seeder;

class PortfolioDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{	
		if (\App::environment('faker'))
		{
			$this->call(CategoryPorfoliosFakerSeeder::class);
			$this->call(PortfoliosFakerSeeder::class);
			$this->call(PortfolioItemsFakerSeeder::class);		
			$this->call(PortfolioFilesFakerSeeder::class);
		}
		else
		{
			$this->call(CategoryPorfoliosTableSeeder::class);
			$this->call(PortfoliosTableSeeder::class);
			$this->call(PortfolioItemsTableSeeder::class);
			$this->call(PortfolioFilesTableSeeder::class);		
		}
	}
}


