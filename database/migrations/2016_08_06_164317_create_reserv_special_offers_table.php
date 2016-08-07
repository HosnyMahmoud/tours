<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservSpecialOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservOffers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('offer_id');
			$table->integer('user_id');
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
		Schema::drop('reservOffers');
	}

}
