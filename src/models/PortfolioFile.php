<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioFile extends Model {


	protected $table = 'portfolio_files';

	protected $fillable = [ 'id', 'portfolio_item_id', 'image', 'url', 'author', 'title', 'summary', 'description' ];

	protected $appends = ['image_url'];

	protected $hidden = [];


	public function portfolioItem(){
		return $this->belongsTo('Vilbur\Portfolio\Models\PortfolioItem');
	}

	public function getImageUrlAttribute() {
		return preg_match('/^http/i', $this->image ) ? $this->image :  Storage::url($this->image);
    }

}
