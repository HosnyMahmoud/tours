<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialOfferReserv extends Model {


	protected $table    = 'special_offer_reservs' ;
	protected $fillable = ['user_id', 'special_offer_id','status'] ; 
}
