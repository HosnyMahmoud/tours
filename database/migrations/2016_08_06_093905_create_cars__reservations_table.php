<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars_reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('offer_id');
			$table->integer('user_id');
			$table->integer('city_id');
			$table->integer('model_id');
			$table->timestamp('date_from');
			$table->timestamp('date_to');
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
		Schema::drop('cars_reservations');
	}

}
