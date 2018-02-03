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
		return Portfolio::all()->toArray();
	}
	/**
	*/
	public function getPortfolioFiles($id)
	{
		return Portfolio::find($id)->portfolioFiles->toArray();
	}
}
