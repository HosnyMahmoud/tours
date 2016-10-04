<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars_Reservation extends Model {

	protected $table    = "cars_reservations" ;
	protected $fillable = ['user_id', 'city_id', 'model_id', 'date_from', 'date_to','status'] ;

		
}
