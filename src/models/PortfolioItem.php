<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioItem extends Model {


	protected $table = 'portfolio_items';

	protected $fillable = [ 'id', 'portfolio_id', 'title', 'summary', 'description' ];

	protected $hidden = [];


	public function portfolio(){
		return $this->belongsTo('Vilbur\Portfolio\Models\Portfolio');
	}
	public function portfolioFiles(){
		return $this->hasMany('Vilbur\Portfolio\Models\PortfolioFile');
	}
}
