<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CarsBrands extends Model {

	//
	protected $table    = "cars_brand" ;
	protected $fillable = ['brand_name','country_id','city_id',
			'slug_ar', 'slug_en', 'meta_desc_ar', 
			'meta_desc_en', 'tags_ar', 'tags_en'];
	
}
