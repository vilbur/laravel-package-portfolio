<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	public function categoryPortfolio(){
		return $this->belongsTo('Vilbur\Portfolio\Models\CategoryPortfolio');
	}
	public function portfolioFiles(){
		return $this->hasMany('Vilbur\Portfolio\Models\PortfolioFile');
	}
}
