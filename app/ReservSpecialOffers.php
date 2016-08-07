<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservSpecialOffers extends Model {

	
	protected $table    = 'reservoffers' ;
	protected $fillable = ['offer_id', 'user_id'] ;
	

}
