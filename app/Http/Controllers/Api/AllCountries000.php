<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ApiSettings ;
use App\Countries ;
use Validator ;

class AllCountries extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function api()
	{
	 	return ApiSettings::first();
	}
		
	public function getCountries(Request $bag)
	{
		$rules = [
					'secret'=>'required' ,
					'lang'	=>'required' 
			     ] ;

		$validator = Validator::make($bag->all(),$rules) ;

		if($validator->fails())
		{
			return response()->json(['status'=>'400' , 'message'=>'some Error happend','errors'=>$validator->errors()->all()] , 400);
		}
		
		if($bag->secret !== @$this->api()->secret)
		{
			return response()->json(['status'=>'400' , 'message'=>'wrong secret key'] , 400);
		}
		
		if(!in_array($bag->lang,['ar','en']))
		{
			return response()->json(['status'=>'400','message'=>' Unexpected language '],400) ;
		}

		$countries = Countries::select('id','name_'.$bag->lang)->get() ;
		if($countries->count() ==  0)
		{
			return response()->json(['status'=>'400' , 'message'=> 'No Data to show'],200) ;
		}

		return response()->json(['status'=>'200' , 'countries'=> $countries],200) ;

	}

	
}
