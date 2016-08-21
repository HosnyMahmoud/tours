<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CarsModels extends Model {

	//	
	protected $table    = "cars_models" ;
 	protected $fillable = ['model_name','price','brand_id','country_id','city_id',
 						'slug_ar', 'slug_en', 'meta_desc_ar', 
						'meta_desc_en', 'tags_ar', 'tags_en']; 
}
 	