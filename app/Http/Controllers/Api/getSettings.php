<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ApiSettings;
use App\Settings ;


class getSettings extends Controller {
	public function __construct(Request $bag)
	{
		$this->beforeFilter(function() use ($bag){
			$api = ApiSettings::first();
			if(!$bag->has('secret'))
				return response()->json(['status' => '400','message'=>'missing secret parameter'],400);
			
			if($bag->secret !== $api->secret)
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret parameter'],401);
		});
	}
	
	public function GetSettings(Request $bag)
	{
		$data = Settings::first() ;
		return response()->json(['status' => '200' , 'data'=> $data] , 200);
	}
	
	
}
