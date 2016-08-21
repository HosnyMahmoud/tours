<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->text('desc_ar');
			$table->text('desc_en');
			$table->integer('hotel_id');
			$table->integer('nights');
			$table->integer('type');
			$table->text('desc');
			$table->integer('country_id');
			$table->integer('city_id');
			$table->string('images');
			$table->decimal('price');
			$table->timestamp('date_from');
			$table->timestamp('date_to');
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
		Schema::drop('offers');
	}

}
