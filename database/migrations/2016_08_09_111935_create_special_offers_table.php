<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('name_ar');
			$table->integer('name_en');
			$table->decimal('price');
			$table->integer('num_of_persons');
			$table->string('images');
			$table->integer('status');
			$table->date('date_from');
			$table->date('date_to');
			$table->text('desc_ar');
			$table->text('desc_en');
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
		Schema::drop('special_offers');
	}

}
