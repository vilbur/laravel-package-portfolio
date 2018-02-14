<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryPortfolio extends Model
{
	use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [ 'slug' => [ 'source' => 'title' ] ];
    }


	public function portfolios(){
		return $this->hasMany('Vilbur\Portfolio\Models\Portfolio');
	}
}
