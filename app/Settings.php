<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {

	protected $table = 'settings';
	protected $fillable = ['site_name_ar', 'site_name_en','site_desc_ar','site_desc_en',
	'site_tags_ar','site_tags_en',
	'phone','email','address_ar','address_en',
	'facebook','twitter',
	'google_Plus','youtube', 'linkedIn','site_status'];
}
