<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialOfferReservsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_offer_reservs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('special_offer_id');
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
		Schema::drop('special_offer_reservs');
	}

}
