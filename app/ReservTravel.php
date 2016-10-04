<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservTravel extends Model {

	
	protected $table    = 'reservtravel' ;
	protected $fillable = ['travel_id', 'user_id','status'] ;
	

}
