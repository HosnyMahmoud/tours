<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ApiSettings ;
use App\Cities ;
use Validator ;

class AllCities extends Controller {

	public function api()
	{
	 	return ApiSettings::first();
	}
		
	public function getCities(Request $bag)
	{
		$rules = [
					'secret'=>'required' ,
					'lang'	=>'required' 
			     ] ;

		$validator = Validator::make($bag->all(),$rules) ;

		if($validator->fails())
		{
			return response()->json(['status'=>'400' , 'message'=>'some Errors happend','errors'=>$validator->errors()->all()] , 400);
		}
		
		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status'=>'400' , 'message'=>'wrong secret key'] , 400);
		}
		
		if(!in_array($bag->lang,['ar','en']))
		{
			return response()->json(['status'=>'400','message'=>' Unexpected language '],400) ;
		}

		$cities = Cities::select('id','name_'.$bag->lang,'country_id')->get() ;
		if($cities->count() ==  0)
		{
			return response()->json(['status'=>'400' , 'message'=> 'No Data to show'],200) ;
		}

		return response()->json(['status'=>'200' , 'countries'=> $cities],200) ;

	}
}
