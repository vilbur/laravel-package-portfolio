<?php

namespace Vilbur\Portfolio\Controllers;

use App\Http\Controllers\Controller;
use Vilbur\Portfolio\Models\Portfolio;


class PortfolioController extends Controller
{
	/**
	*/
	public function getAllPortfolios()
	{
		return Portfolio::all()->sortByDesc('id')->values();
	}
	/**
	*/
	public function getPortfolioFiles($slug)
	{
		return Portfolio::findBySlug($slug)->portfolioFiles->toArray();
	}
}
