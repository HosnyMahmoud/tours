<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiSettings extends Model {

	protected $table = 'api_settings';
	protected $fillable = ['secret','version'];
	//


}
