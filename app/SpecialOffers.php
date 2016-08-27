<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialOffers extends Model {

	protected $table    = 'special_offers';
	protected $fillable = 
			[
				'name_ar', 
				'name_en',
				'price', 
				'desc_ar', 
				'desc_en', 
				'status', // Will be to active offer to start reserv or no .
				'num_of_persons', 
				'images', 
				'date_from', 
				'date_to'

			];

}
