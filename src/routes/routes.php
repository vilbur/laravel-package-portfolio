<?php


Route::get('/api/portfolio',	'Vilbur\Portfolio\Controllers\PortfolioController@getAllPortfolios');
Route::get('/api/portfolio/{id}',	'Vilbur\Portfolio\Controllers\PortfolioController@getPortfolioFiles');