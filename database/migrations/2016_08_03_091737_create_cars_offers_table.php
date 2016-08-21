<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars_offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('offer_name_ar');
			$table->string('offer_name_en');
			$table->text('offer_desc_ar');
			$table->text('offer_desc_en');
			$table->integer('country_id');
			$table->integer('city_id');
			$table->decimal('price');
			$table->string('color');
			$table->string('image');
			$table->integer('brand_id');
			$table->integer('model_id');
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
		Schema::drop('cars_offers');
	}

}
