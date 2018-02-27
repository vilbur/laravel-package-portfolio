<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Portfolio extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;

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
	public function portfolioItems(){
		return $this->hasMany('Vilbur\Portfolio\Models\PortfolioItem');
	}

	public function getImageUrlAttribute() {
		return preg_match('/^http/i', $this->image ) ? $this->image :  Storage::url($this->image);
    }
}
