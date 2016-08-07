<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ApiSettings;
use App\Travel ;

class TravelCtrl extends Controller {

	public function api()
	{
		return ApiSettings::first();;
	}

	
	public function getCountries(Request $bag)
	{

		if(!$bag->has('secret'))
		{
			return response()->json(['status'=>'400', 'msg'=>'missing secret key'] , 400);
		}

		if($bag->secret !== $this->api()->secret)
		{
			return response()->json(['status'=>'401' , 'msg'=>'Wrong Secret Key'] , 401) ;
		}

		/*if(!$bag->has('country'))
		{
			return response()->json(['status'=>'400', 'msg'=>'missing country key'] , 400);
		}*/

		$countries = Travel::select('id','country_name')->get();

		return response()->json(['status'=>'200', 'data'=> $countries] , 200);
	}


	public function getAirLines(Request $bag)
	{

		if(!$bag->has('secret'))
		{
			return response()->json(['status'=>'400', 'msg'=>'missing secret key'] , 400);
		}

		if($bag->secret !== $this->api()->secret)
		{
			return response()->json(['status'=>'401' , 'msg'=>'Wrong Secret Key'] , 401) ;
		}

		if(!$bag->has('country'))
		{
			return response()->json(['status'=>'400', 'msg'=>'missing country key'] , 400);
		}


		$airLins = Travel::where('country_name',$bag->country)->get();
		return response()->json(['status'=>'200', 'data'=> $airLins] , 200);
		
	}

	

}
