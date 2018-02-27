<?php

namespace Vilbur\Portfolio\Controllers;

use App\Http\Controllers\Controller;
use Vilbur\Portfolio\Models\Portfolio;
use Vilbur\Portfolio\Models\PortfolioItem;


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
	public function getPortfolioItems($portfolio_slug)
	{
		return Portfolio::findBySlug($portfolio_slug)->portfolioItems->toArray();
	}

	/**
	*/
	public function getPortfolioFiles($portfolio_item_id)
	{
		return PortfolioItem::find($portfolio_item_id)->portfolioFiles->toArray();
	}

}
