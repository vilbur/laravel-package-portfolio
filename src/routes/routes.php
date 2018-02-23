<?php


Route::get('/api/portfolio',	'Vilbur\Portfolio\Controllers\PortfolioController@getAllPortfolios');
Route::get('/api/portfolio/{slug}',	'Vilbur\Portfolio\Controllers\PortfolioController@getPortfolioFiles');