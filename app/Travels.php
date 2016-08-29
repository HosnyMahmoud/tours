<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Travels extends Model {
	protected $table    = 'travels' ;
	protected $fillable = ['name_ar', 'name_en', 'desc_ar', 'desc_en', 'hotel_id', 'nights', 'type','country_id', 'city_id', 'images', 'price', 'date_from', 'date_to', 'slug_ar', 'slug_en', 'meta_desc_ar', 'meta_desc_en', 'tags_ar', 'tags_en'];
							
	public static function rules($type = 'add')
	{
			return [
						'name_ar'      => 'required',
						'name_en'      => 'required',
						'nights'   	   => 'required|Integer',
						'price'        => 'required|between:0,99.99',
						'date_from'    => 'required|date',
						'date_to'      => 'required|date',
						'desc_ar'      => 'required',
						'desc_en'      => 'required',
						'meta_desc_ar' => 'required',
						'meta_desc_en' => 'required',
						'tags_ar'      => 'required',
						'tags_en'      => 'required',
					];
		}
}
						//'imgs'         => ($type == 'add')?'required':''