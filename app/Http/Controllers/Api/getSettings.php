<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ApiSettings;
use App\Settings ;


class getSettings extends Controller {
	
	public function api()
	{
		$api = ApiSettings::first();
		return $api;
	}

	public function GetSettings(Request $bag){

		if(!$bag->has('secret'))
		{
			return response()->json(['status' => '400','message'=>'missing secret key'],400);
		}

		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
		}

		$data = Settings::first() ;
		return response()->json(['status' => '200' , 'data'=> $data] , 200);
	}
	
	
}
