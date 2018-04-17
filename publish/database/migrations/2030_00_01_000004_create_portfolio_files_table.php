<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('portfolio_files', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('portfolio_item_id')->unsigned()->index();
			$table->foreign('portfolio_item_id')->references('id')->on('portfolio_items')->onDele;

			$table->string('image')->nullable();
			$table->string('url')->nullable();
			$table->string('title')->nullable();
			$table->string('author')->nullable();
			$table->string('summary')->nullable();
			$table->text('description')->nullable();

			$table->timestamps();
		});
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('portfolio_files');
    }
}

