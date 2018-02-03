<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPortfolio extends Model
{
	public function portfolios(){
		return $this->hasMany('Vilbur\Portfolio\Models\Portfolio');
	}
}
