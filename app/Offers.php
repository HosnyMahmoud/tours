<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model {

	protected $fillable = ['name_ar','name_en','desc_ar','desc_en','hotel_id', 'nights',
			'type','desc','price','slug_ar',
			'slug_en','meta_desc_ar','meta_desc_en', 
			'tags_ar','tags_en'];
							
}
