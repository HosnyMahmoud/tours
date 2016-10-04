<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels_reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotel_id');
			$table->integer('user_id');
			$table->timestamp('from');
			$table->timestamp('to');
			$table->integer('status');
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
		Schema::drop('hotels_reservations');
	}

}
