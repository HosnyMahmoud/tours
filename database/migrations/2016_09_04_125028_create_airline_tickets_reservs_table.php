<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineTicketsReservsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('airline_tickets_reservs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('city_id');
			$table->integer('airport_from');
			$table->integer('airport_to') ;
			$table->integer('num_persons');
			$table->integer('num_child');
			$table->integer('type') ;
			$table->date('date_from') ;
			$table->date('date_to') ;
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
		Schema::drop('airline_tickets_reservs');
	}

}
