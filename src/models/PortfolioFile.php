<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioFile extends Model {


	protected $table = 'portfolio_files';

	protected $fillable = [ 'id','title', 'image', 'url', 'author', 'type', 'about',  'portfolio_id', 'description' ];

	protected $appends = ['image_url'];

	protected $hidden = [];


	public function portfolio(){
		return $this->belongsTo('Vilbur\Portfolio\Models\Portfolio');
	}

	public function getImageUrlAttribute() {
		return preg_match('/^http/i', $this->image ) ? $this->image :  Storage::url($this->image);
    }

}
