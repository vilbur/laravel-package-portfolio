<?php

use Illuminate\Database\Seeder;
use Vilbur\Portfolio\Models\PortfolioFile;

class PortfolioFilesSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		if(!PortfolioFile::all()->first())
			factory(PortfolioFile::class, 20)->create();
	}

}
