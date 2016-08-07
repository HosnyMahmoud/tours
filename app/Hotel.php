<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {

	protected $fillable =
		['name_ar', 'name_en', 'desc_ar','desc_en','stars', 
						'num_of_per','logo', 'images','price','country_id',
						'city_id','slug_ar', 'slug_en', 'meta_desc_ar', 
						'meta_desc_en', 'tags_ar', 'tags_en'
		];
 
}
