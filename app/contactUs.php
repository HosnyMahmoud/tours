<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model {

	protected $table    = 'contact_us' ;
	protected $fillable = ['title_ar', 'title_en', 'content_ar', 'content_en'] ;

}
