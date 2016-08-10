<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialOffers extends Model {

	protected $table    = 'special_offers';
	protected $fillable = ['travel_id', 'new_price', 'date_from', 'date_to'];

}
