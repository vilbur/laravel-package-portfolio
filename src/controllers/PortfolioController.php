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
		return Portfolio::all()->sortByDesc('order')->values();
	}
	/**
	*/
	public function getPortfolioItems($portfolio_slug)
	{
		return Portfolio::findBySlug($portfolio_slug)->portfolioItems->toArray();
		//return Portfolio::findBySlug($portfolio_slug)->portfolioItems->sortByDesc('id')->values();
	}

	/**
	*/
	public function getPortfolioFiles($portfolio_item_id)
	{
		//return PortfolioItem::find($portfolio_item_id)->portfolioFiles->toArray();
		return PortfolioItem::find($portfolio_item_id)->portfolioFiles->sortBy('id')->values();
	}

}
