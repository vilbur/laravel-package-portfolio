<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Portfolio extends Model
{
	use Sluggable;

    protected $appends = ['image_url'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [ 'slug' => [ 'source' => 'title' ] ];
    }

	public function categoryPortfolio(){
		return $this->belongsTo('Vilbur\Portfolio\Models\CategoryPortfolio');
	}
	public function portfolioFiles(){
		return $this->hasMany('Vilbur\Portfolio\Models\PortfolioFile');
	}

	public function getImageUrlAttribute() {
		return preg_match('/^http/i', $this->image ) ? $this->image :  Storage::url($this->image);
    }
}
