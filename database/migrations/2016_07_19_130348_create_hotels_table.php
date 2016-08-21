<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->text('desc_ar');
			$table->text('desc_en');
			$table->decimal('price');
			$table->integer('num_of_per'); //Test
			$table->integer('country_id'); //Test
			$table->integer('city_id'); //Test
			$table->integer('stars');
			$table->string('logo');
			$table->string('images');
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
		Schema::drop('hotels');
	}

}
