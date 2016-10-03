<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('image');
			$table->string('email')->unique();
			$table->string('username')->unique();
			$table->string('mobile');
			$table->integer('city');
			$table->string('password');
			$table->string('source');
			$table->string('source_id');
			$table->string('mac_address');
			$table->string('device_token');
			$table->text('details');
			$table->string('verification_code');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
