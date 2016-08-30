<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AirPort extends Model {

	protected $table    = 'air_ports' ;
	protected $fillable = [

							'name_ar', 'name_en', 'city_id'
						  ]; 

					  
}
