<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model {

	protected $table = "countries" ;
 	protected $fillable = ['name_ar','name_en',]; 


 	public static function rules($type = 'add')
 	{

 		return 
 		[
 			'name_ar' => 'required',
 			'name_en' => 'required'
 		];

 	}

}
