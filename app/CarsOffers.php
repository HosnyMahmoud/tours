<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CarsOffers extends Model {

 protected $tabel 	 = "cars_offers" ;
 
 protected $fillable = ['offer_name_ar', 
 						'offer_name_en',
 						'offer_desc_ar', 
 						'offer_desc_en', 
 						'country_id', 
 						'city_id', 'price', 
 						'color', 'image', 'brand_id', 'model_id'] ;

	public static function rules($type = 'add')
	{
		return 	[	
					'offer_name_ar'    => 'required',
					'offer_name_en'    => 'required',
					'country_id' 	   => 'required',
					'city_id'   	   => 'required',
					'offer_desc_ar'    => 'required',
					'offer_desc_en'    => 'required',
					'price'            => 'required',
					'color'            => 'required',
					'img'              => ($type == 'add')?'required':'',
					'brand_id'         => 'required',
					'model_id'         => 'required',
				];	
	} 	  


}
