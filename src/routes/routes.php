<?php


Route::get('/api/get-portfolio',	'Vilbur\Portfolio\Controllers\PortfolioController@getAllPortfolios');
Route::get('/api/get-portfolio-items/{portfolio_slug}',	'Vilbur\Portfolio\Controllers\PortfolioController@getPortfolioItems');
Route::get('/api/get-portfolio-files/{portfolio_item_id}',	'Vilbur\Portfolio\Controllers\PortfolioController@getPortfolioFiles');