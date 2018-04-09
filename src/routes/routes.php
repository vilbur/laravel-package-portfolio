<?php

Route::get('/db/category-portfolio',	'Vilbur\Portfolio\Controllers\PortfolioController@getCategoryPortfolios');
Route::get('/db/portfolio',	'Vilbur\Portfolio\Controllers\PortfolioController@getAllPortfolios');
Route::get('/db/portfolio-items/{portfolio_slug}',	'Vilbur\Portfolio\Controllers\PortfolioController@getPortfolioItems');
Route::get('/db/portfolio-files/{portfolio_item_id}',	'Vilbur\Portfolio\Controllers\PortfolioController@getPortfolioFiles');