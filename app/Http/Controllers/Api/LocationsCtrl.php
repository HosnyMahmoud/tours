<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings;
use App\Countries;
use App\Cities;

class LocationsCtrl extends Controller {
	public function __construct(Request $bag)
	{
		$this->beforeFilter(function() use ($bag){
			$api = ApiSettings::first();
			if(!$bag->has('secret'))
			{
				return response()->json(['status' => '400','message'=>'missing secret key'],400);
			}
			if($bag->secret !== $api->secret)
			{
				return response()->json(['status' => '401','message'=>'Unauthorized : wrong secret key'],401);
			}
		});
	}
	
	public function getCountries(Request $bag)
	{	
		if(!$bag->has('lang'))
		{
			return response()->json(['status' => '400','message'=>'missing lang parameter'],400);
		}

		$countries = Countries::all();
		if($countries->count() == 0)
		{
			return response()->json(['status' => '400','message'=>'No records to show'],400);
		}
		$data = [];
		$i = 0;
		foreach ($countries as $country) {
			$data[$i]['id'] = $country['id'];	
			$data[$i]['name'] = $country['name_'.$bag->lang];	
			$i++;
		}
		return response()->json(['status' => '200','data'=>$data],200);

	}

	public function getCities(Request $bag)
	{
		if(!$bag->has('lang'))
		{
			return response()->json(['status' => '400','message'=>'missing lang parameter'],400);
		}
		if(!$bag->has('country_id'))
		{
			return response()->json(['status' => '400','message'=>'missing country_id parameter'],400);
		}
		$countries = Countries::find($bag->country_id);
		$cites     = Cities::where('country_id',$bag->country_id)->get();
		if($cites->count() == 0)
		{
			return response()->json(['status' => '400','message'=>'No records to show'],400);
		}
		
		$data = [];
		$i = 0;
		foreach ($cites as $city) {
			$data[$i]['id'] = $city['id'];	
			$data[$i]['name'] = $city['name_'.$bag->lang];	
			$data[$i]['country_id'] = $city['country_id'];	
			$i++;
		}
		return response()->json(['status' => '200','country'=>$countries['name_'.$bag->lang],'data'=>$data],200);
	}
}
