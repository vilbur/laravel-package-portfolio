<?php

namespace Vilbur\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
//use Cviebrock\EloquentSluggable\SluggableInterface;
//use Cviebrock\EloquentSluggable\SluggableTrait;

class PortfolioFile extends Model {

    //use SluggableTrait;

	protected $table = 'portfolio_files';

	protected $fillable = [ 'id','title', 'file', 'url', 'author', 'type', 'about',  'portfolio_id', 'portfolio_skill_id', 'highlighted', 'description' ];

	public $sluggable =[ 'build_from'=> 'title'];

	 //protected $nullable = ['skill_id'];

	protected $hidden = array();


	public function portfolio(){
		return $this->belongsTo('Vilbur\Portfolio\Models\Portfolio');
	}

	//public function PortfolioSkill(){
	//	return $this->belongsTo('Vilbur\Portfolio\Models\PortfolioSkill');
	//}

}
