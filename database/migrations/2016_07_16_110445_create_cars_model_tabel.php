text<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsModelTabel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars_models', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('model_name');
			$table->decimal('price');
			$table->integer('brand_id');
			$table->integer('country_id');
			$table->integer('city_id');
			$table->string('slug_ar');
			$table->string('slug_en');
			$table->text('meta_desc_ar');
			$table->text('meta_desc_en');
			$table->text('tags_ar');
			$table->text('tags_en');
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
		Schema::drop('cars_models');
	}

}
