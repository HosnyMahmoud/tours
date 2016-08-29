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
							'status', 
							'images', 
							'date_from',
							'date_to', 
						    'meta_desc_ar', 
							'meta_desc_en', 
							'tags_ar',
							'tags_en'
						];

	public static function rules($type ='add',$id = null) 
	{
		return	[
					'name_ar'      =>'required',
					'name_en'      =>'required',
					'price'        =>'required',
					'desc_ar'      =>'required',
					'desc_en'      =>'required',
					'status'       =>'required',
					'imgs'         =>'required',
					'date_from'    =>'required',
					'date_to'      =>'required',
					'meta_desc_ar' =>'required',
					'meta_desc_en' =>'required',
					'tags_ar'      =>'required',
					'tags_en'      =>'required',
				];

	}


}
